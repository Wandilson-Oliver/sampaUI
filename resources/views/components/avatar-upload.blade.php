@props([
    'label' => null,
    'name' => 'avatar',
    'src' => null,
    'alt' => null,
    'size' => 'xl',
    'accept' => 'image/*',
    'placeholder' => 'No Image',
    'help' => null,
    'hint' => null,
    'removeName' => null,
    'removeModel' => null,
    'removeLabel' => 'Remover imagem',
    'uploadLabel' => 'Selecionar imagem',
    'error' => null,
    'disabled' => false,
    'loading' => false,
    'loadingTarget' => null,
    'required' => false,
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-avatar-upload');
    $removeInputName = $removeName ?? ($name ? $name.'_remove' : null);
    $errorMessage = sampaui_error($name, $error, $errors ?? null);
    $fieldHint = $hint ?? $help;
    $describedBy = sampaui_described_by($id, $fieldHint, $errorMessage, $attributes->get('aria-describedby'));
    $wireModelAttribute = collect($attributes->getAttributes())->filter(fn (mixed $value, string $key): bool => str_starts_with($key, 'wire:model'))->first();
    $removeWireModel = $removeModel;
    if (! $removeWireModel && $wireModelAttribute) {
        $removeWireModel = str_contains($wireModelAttribute, '.')
            ? preg_replace('/([^.]+)$/', '$1_remove', $wireModelAttribute)
            : \Illuminate\Support\Str::camel($wireModelAttribute.'_remove');
    }
    $sizes = ['sm' => 'h-20 w-20', 'md' => 'h-24 w-24', 'lg' => 'h-32 w-32', 'xl' => 'h-40 w-40', '2xl' => 'h-48 w-48'];
    $selectedSize = $sizes[$size] ?? $sizes['xl'];
    $unavailable = $disabled || $loading;
@endphp

<x-sampaui::field :id="$id" :label="$label" :hint="$fieldHint" :error="$errorMessage" :required="$required" class="{{ sampaui_classes(['inline-flex flex-col items-center text-center', $attributes->get('class')]) }}">
    <div x-data="SampaUI.avatarUpload({ existing: @js($src) })" class="relative">
        <label
            for="{{ $id }}"
            class="{{ sampaui_classes(['flex shrink-0 cursor-pointer items-center justify-center overflow-hidden rounded-full border-4 border-white bg-light font-semibold text-secondary/45 shadow-lg shadow-secondary/10 ring-1 ring-light transition hover:ring-primary/30 focus-within:ring-2 focus-within:ring-primary/30 focus-within:ring-offset-2', $selectedSize, 'border-danger ring-2 ring-danger/20' => filled($errorMessage), 'cursor-not-allowed opacity-50' => $unavailable]) }}"
            aria-label="{{ $uploadLabel }}"
        >
            <template x-if="currentSrc"><img x-bind:src="currentSrc" alt="{{ $alt ?? $label ?? 'Avatar' }}" class="h-full w-full object-cover"></template>
            <span x-show="!currentSrc" x-cloak class="block max-w-full px-3 text-center text-base leading-tight">{{ $placeholder }}</span>
        </label>

        <div class="pointer-events-none absolute -right-2 bottom-2 h-16 w-16">
            <label for="{{ $id }}" class="{{ sampaui_classes(['pointer-events-auto absolute bottom-0 right-0 inline-flex h-10 w-10 cursor-pointer items-center justify-center rounded-full bg-primary text-white shadow-md shadow-primary/25 transition hover:bg-primary/90 focus-within:ring-2 focus-within:ring-primary/30 focus-within:ring-offset-2', 'cursor-not-allowed opacity-50' => $unavailable]) }}" aria-label="{{ $uploadLabel }}" title="{{ $uploadLabel }}"><i class="bi bi-pencil-fill text-sm" aria-hidden="true"></i></label>
            <button type="button" class="pointer-events-auto absolute bottom-12 -right-1.5 inline-flex h-10 w-10 items-center justify-center rounded-full bg-danger text-white shadow-md shadow-danger/25 transition hover:bg-danger/90 focus:outline-none focus:ring-2 focus:ring-danger/30 focus:ring-offset-2" x-show="currentSrc" x-cloak x-on:click="removeImage()" @disabled($unavailable) aria-label="{{ $removeLabel }}" title="{{ $removeLabel }}"><i class="bi bi-trash3-fill text-sm" aria-hidden="true"></i></button>
        </div>

        <input
            x-ref="input"
            id="{{ $id }}"
            type="file"
            @if ($name) name="{{ $name }}" @endif
            @if ($accept) accept="{{ $accept }}" @endif
            class="sr-only"
            x-on:change="selectFile($event)"
            @disabled($unavailable)
            @required($required)
            @if ($loadingTarget ?? $wireModelAttribute) wire:loading.attr="disabled" wire:target="{{ $loadingTarget ?? $wireModelAttribute }}" @endif
            @if ($errorMessage) aria-invalid="true" @else aria-invalid="false" @endif
            @if ($describedBy) aria-describedby="{{ $describedBy }}" @endif
            @if ($loading) aria-busy="true" @endif
            {{ $attributes->except(['class', 'id', 'aria-describedby']) }}
        >

        @if ($removeInputName)
            <input x-ref="removeInput" type="hidden" name="{{ $removeInputName }}" x-bind:value="removed ? '1' : '0'" @if ($removeWireModel) wire:model="{{ $removeWireModel }}" @endif>
        @endif
    </div>
</x-sampaui::field>
