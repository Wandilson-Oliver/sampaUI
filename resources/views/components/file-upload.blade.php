@props([
    'label' => null,
    'name' => null,
    'accept' => null,
    'multiple' => false,
    'preview' => false,
    'error' => null,
    'disabled' => false,
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-file');
    $errorMessage = sampaui_error($name, $error, $errors ?? null);
@endphp

<div
    class="space-y-2"
    @if ($preview)
        x-data="{
            files: [],
            setFiles(input) {
                this.revokePreviewUrls()
                this.files = Array.from(input.files || [])
                    .filter(file => file.type.startsWith('image/'))
                    .map(file => ({ file, name: file.name, url: URL.createObjectURL(file) }))
            },
            removeFile(index) {
                const removed = this.files.splice(index, 1)[0]

                if (removed) URL.revokeObjectURL(removed.url)

                const transfer = new DataTransfer()

                this.files.forEach(item => transfer.items.add(item.file))
                this.$refs.input.files = transfer.files
                this.$refs.input.dispatchEvent(new Event('change', { bubbles: true }))
                this.$refs.input.dispatchEvent(new Event('input', { bubbles: true }))
            },
            revokePreviewUrls() {
                this.files.forEach(file => URL.revokeObjectURL(file.url))
            },
        }"
        x-on:beforeunload.window="revokePreviewUrls"
    @endif
>
    @if ($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-secondary">{{ $label }}</label>
    @endif

    <label for="{{ $id }}" class="{{ sampaui_classes(['flex cursor-pointer flex-col items-center justify-center rounded-default border border-dashed border-secondary/40 bg-white px-6 py-8 text-center transition hover:border-primary hover:bg-light/30', 'border-danger ring-2 ring-danger/20' => filled($errorMessage), 'cursor-not-allowed opacity-50' => $disabled]) }}">
        <i class="bi bi-cloud-arrow-up text-2xl text-primary" aria-hidden="true"></i>
        <span class="mt-2 text-sm font-medium text-secondary">{{ trim($slot->toHtml()) !== '' ? $slot : 'Clique para selecionar arquivo' }}</span>
        <input
            id="{{ $id }}"
            type="file"
            @if ($name) name="{{ $name }}" @endif
            @if ($accept) accept="{{ $accept }}" @endif
            class="sr-only"
            @if ($preview) x-ref="input" @endif
            @if ($multiple) multiple @endif
            @disabled($disabled)
            @if ($preview) x-on:change="setFiles($event.target)" @endif
            {{ $attributes->except('class') }}
        >
    </label>

    @if ($preview)
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-4" x-show="files.length > 0" x-cloak>
            <template x-for="(file, index) in files" x-bind:key="file.url">
                <figure class="relative overflow-hidden rounded-default border border-light bg-white">
                    <button
                        type="button"
                        class="absolute right-2 top-2 inline-flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-danger text-white shadow-md shadow-danger/20 transition hover:bg-danger/90 focus:outline-none focus:ring-2 focus:ring-danger/30 focus:ring-offset-2"
                        x-on:click="removeFile(index)"
                        aria-label="Remover imagem do preview"
                        title="Remover imagem"
                    >
                        <i class="bi bi-trash3-fill text-xs" aria-hidden="true"></i>
                    </button>
                    <img x-bind:src="file.url" x-bind:alt="file.name" class="aspect-square w-full object-cover">
                    <figcaption class="truncate px-2 py-1 text-xs text-secondary" x-text="file.name"></figcaption>
                </figure>
            </template>
        </div>
    @endif

    @if ($errorMessage)
        <p class="text-sm text-danger">{{ $errorMessage }}</p>
    @endif
</div>
