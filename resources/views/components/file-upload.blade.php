@props([
    'label' => null,
    'name' => null,
    'accept' => null,
    'multiple' => false,
    'preview' => false,
    'hint' => null,
    'error' => null,
    'disabled' => false,
    'loading' => false,
    'loadingTarget' => null,
    'required' => false,
    'maxSize' => 0,
    'retry' => false,
    'chunkSize' => 0,
    'typeError' => 'Tipo de arquivo nao permitido.',
    'sizeError' => 'O arquivo excede o tamanho maximo permitido.',
    'cancelLabel' => 'Cancelar upload',
    'retryLabel' => 'Tentar novamente',
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-file');
    $errorMessage = sampaui_error($name, $error, $errors ?? null);
    $describedBy = sampaui_described_by($id, $hint, $errorMessage, $attributes->get('aria-describedby'));
    $wireModel = collect($attributes->getAttributes())->filter(fn (mixed $value, string $key): bool => str_starts_with($key, 'wire:model'))->first();
    $unavailable = $disabled || $loading;
@endphp

<x-sampaui::field :id="$id" :label="$label" :hint="$hint" :error="$errorMessage" :required="$required">
    <div
        x-data="SampaUI.fileUpload(@js([
            'accept' => $accept,
            'maxSize' => (int) $maxSize,
            'model' => $wireModel,
            'retry' => $retry,
            'chunkSize' => (int) $chunkSize,
            'typeError' => $typeError,
            'sizeError' => $sizeError,
        ]))"
        x-on:beforeunload.window="typeof revokePreviewUrls === 'function' && revokePreviewUrls()"
        class="space-y-3"
        @if ($chunkSize) data-chunk-size="{{ (int) $chunkSize }}" @endif
    >
        <label for="{{ $id }}" class="{{ sampaui_classes(['flex cursor-pointer flex-col items-center justify-center rounded-default border border-dashed border-secondary/40 bg-surface px-6 py-8 text-center transition hover:border-primary hover:bg-light/30 focus-within:border-primary focus-within:ring-2 focus-within:ring-primary/20', $attributes->get('class'), 'border-danger ring-2 ring-danger/20' => filled($errorMessage), 'cursor-not-allowed opacity-50' => $unavailable]) }}">
            <i class="bi bi-cloud-arrow-up text-2xl text-primary" aria-hidden="true"></i>
            <span class="mt-2 text-sm font-medium text-secondary">{{ trim($slot->toHtml()) !== '' ? $slot : 'Clique para selecionar arquivo' }}</span>
            @if ($maxSize)<span class="mt-1 text-xs text-secondary/60">Maximo: {{ $maxSize }} KB</span>@endif
            <input
                x-ref="input"
                id="{{ $id }}"
                type="file"
                @if ($name) name="{{ $name }}" @endif
                @if ($accept) accept="{{ $accept }}" @endif
                class="sr-only"
                @if ($multiple) multiple @endif
                @disabled($unavailable)
                @required($required)
                @if ($loadingTarget ?? $wireModel) wire:loading.attr="disabled" wire:target="{{ $loadingTarget ?? $wireModel }}" @endif
                x-on:change="setFiles($event.target)"
                @if ($errorMessage) aria-invalid="true" @else aria-invalid="false" @endif
                @if ($describedBy) aria-describedby="{{ $describedBy }}" @endif
                @if ($loading) aria-busy="true" @endif
                {{ $attributes->except(['class', 'id', 'aria-describedby']) }}
            >
        </label>

        <p x-show="error" x-cloak x-text="error" class="text-sm text-danger" role="alert"></p>

        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4" x-show="files.length > 0" x-cloak>
            <template x-for="(file, index) in files" x-bind:key="file.id">
                <article class="relative overflow-hidden rounded-default border border-border bg-surface">
                    <img x-show="@js($preview) && file.url" x-bind:src="file.url" x-bind:alt="file.name" class="aspect-square w-full object-cover">
                    <div class="space-y-2 p-3">
                        <p class="truncate text-xs font-medium text-secondary" x-text="file.name"></p>
                        <div class="h-1.5 overflow-hidden rounded-full bg-light" role="progressbar" aria-label="Progresso do upload" aria-valuemin="0" aria-valuemax="100" x-bind:aria-valuenow="Math.round(file.progress)"><div class="h-full bg-primary transition-[width]" x-bind:style="`width: ${file.progress}%`"></div></div>
                        <div class="flex items-center justify-between gap-2 text-xs text-secondary/70"><span x-text="file.status"></span><span x-text="`${Math.round(file.progress)}%`"></span></div>
                        <button type="button" class="text-xs font-medium text-danger focus:outline-none focus:ring-2 focus:ring-danger/30" x-on:click="removeFile(index)" x-show="file.status === 'ready'" x-bind:aria-label="'Remover ' + file.name">Remover</button>
                    </div>
                </article>
            </template>
        </div>

        <div class="flex flex-wrap gap-2" x-show="files.some(file => ['uploading', 'error', 'cancelled'].includes(file.status))" x-cloak>
            <button type="button" class="rounded-default border border-danger px-3 py-2 text-sm font-medium text-danger focus:outline-none focus:ring-2 focus:ring-danger/20" x-show="files.some(file => file.status === 'uploading')" x-on:click="cancel()">{{ $cancelLabel }}</button>
            @if ($retry)<button type="button" class="rounded-default border border-primary px-3 py-2 text-sm font-medium text-primary focus:outline-none focus:ring-2 focus:ring-primary/20" x-show="files.some(file => ['error', 'cancelled'].includes(file.status))" x-on:click="retryUpload()">{{ $retryLabel }}</button>@endif
        </div>
    </div>
</x-sampaui::field>
