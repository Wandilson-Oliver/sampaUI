@props([
    'label' => null,
    'name' => 'avatar',
    'src' => null,
    'alt' => null,
    'size' => 'xl',
    'accept' => 'image/*',
    'placeholder' => 'No Image',
    'help' => null,
    'removeName' => null,
    'removeModel' => null,
    'removeLabel' => 'Remover imagem',
    'uploadLabel' => 'Selecionar imagem',
    'error' => null,
    'disabled' => false,
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-avatar-upload');
    $removeInputName = $removeName ?? ($name ? $name.'_remove' : null);
    $errorMessage = sampaui_error($name, $error, $errors ?? null);
    $wireModelAttribute = collect($attributes->getAttributes())
        ->filter(fn (mixed $value, string $key): bool => str_starts_with($key, 'wire:model'))
        ->first();
    $removeWireModel = $removeModel ?? ($wireModelAttribute ? \Illuminate\Support\Str::camel($wireModelAttribute.'_remove') : null);

    $sizes = [
        'sm' => 'h-20 w-20',
        'md' => 'h-24 w-24',
        'lg' => 'h-32 w-32',
        'xl' => 'h-40 w-40',
        '2xl' => 'h-48 w-48',
    ];

    $selectedSize = $sizes[$size] ?? $sizes['xl'];
@endphp

<div
    class="{{ sampaui_classes(['inline-flex flex-col items-center gap-3 text-center', 'opacity-50' => $disabled]) }}"
    x-data="{
        preview: null,
        removed: false,
        existing: @js($src),
        get currentSrc() {
            return this.removed ? null : (this.preview || this.existing)
        },
        selectFile(event) {
            const [file] = Array.from(event.target.files || []).filter(file => file.type.startsWith('image/'))

            if (! file) {
                this.preview = null
                return
            }

            if (this.preview) URL.revokeObjectURL(this.preview)

            this.removed = false
            this.preview = URL.createObjectURL(file)
            this.syncRemoveInput()
        },
        removeImage() {
            this.removed = true
            if (this.preview) URL.revokeObjectURL(this.preview)
            this.preview = null
            this.$refs.input.value = ''
            this.syncRemoveInput()
        },
        syncRemoveInput() {
            this.$nextTick(() => {
                if (! this.$refs.removeInput) return

                this.$refs.removeInput.value = this.removed ? '1' : '0'
                this.$refs.removeInput.dispatchEvent(new Event('input', { bubbles: true }))
            })
        },
    }"
>
    @if ($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-secondary">{{ $label }}</label>
    @endif

    <div class="relative">
        <label
            for="{{ $id }}"
            class="{{ sampaui_classes(['flex shrink-0 cursor-pointer items-center justify-center overflow-hidden rounded-full border-4 border-white bg-light font-semibold text-secondary/45 shadow-lg shadow-secondary/10 ring-1 ring-light transition hover:ring-primary/30', $selectedSize, 'border-danger ring-2 ring-danger/20' => filled($errorMessage), 'cursor-not-allowed' => $disabled]) }}"
            aria-label="{{ $uploadLabel }}"
        >
            <template x-if="currentSrc">
                <img x-bind:src="currentSrc" alt="{{ $alt ?? $label ?? 'Avatar' }}" class="h-full w-full object-cover">
            </template>

            <span x-show="! currentSrc" x-cloak class="block max-w-full px-3 text-center text-base leading-tight">{{ $placeholder }}</span>
        </label>

        <div class="pointer-events-none absolute -right-2 bottom-2 h-16 w-16">
            <label
                for="{{ $id }}"
                class="{{ sampaui_classes(['pointer-events-auto absolute bottom-0 right-0 inline-flex h-10 w-10 cursor-pointer items-center justify-center rounded-full bg-primary text-white shadow-md shadow-primary/25 transition hover:bg-primary/90 focus-within:ring-2 focus-within:ring-primary/30 focus-within:ring-offset-2', 'cursor-not-allowed' => $disabled]) }}"
                aria-label="{{ $uploadLabel }}"
                title="{{ $uploadLabel }}"
            >
                <i class="bi bi-pencil-fill text-sm" aria-hidden="true"></i>
            </label>

            <button
                type="button"
                class="pointer-events-auto absolute bottom-12 -right-1.5 inline-flex h-10 w-10 cursor-pointer items-center justify-center rounded-full bg-danger text-white shadow-md shadow-danger/25 transition hover:bg-danger/90 focus:outline-none focus:ring-2 focus:ring-danger/30 focus:ring-offset-2"
                x-show="currentSrc"
                x-cloak
                x-on:click="removeImage()"
                @disabled($disabled)
                aria-label="{{ $removeLabel }}"
                title="{{ $removeLabel }}"
            >
                <i class="bi bi-trash3-fill text-sm" aria-hidden="true"></i>
            </button>
        </div>

        <input
            x-ref="input"
            id="{{ $id }}"
            type="file"
            @if ($name) name="{{ $name }}" @endif
            @if ($accept) accept="{{ $accept }}" @endif
            class="sr-only"
            x-on:change="selectFile($event)"
            @disabled($disabled)
            {{ $attributes->except('class') }}
        >

        @if ($removeInputName)
            <input
                x-ref="removeInput"
                type="hidden"
                name="{{ $removeInputName }}"
                x-bind:value="removed ? '1' : '0'"
                @if ($removeWireModel) wire:model="{{ $removeWireModel }}" @endif
            >
        @endif
    </div>

    @if ($help)
        <p class="text-sm text-secondary">{{ $help }}</p>
    @endif

    @if ($errorMessage)
        <p class="text-sm text-danger">{{ $errorMessage }}</p>
    @endif
</div>
