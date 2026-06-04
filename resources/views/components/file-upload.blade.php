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
    @if ($preview) x-data="{ files: [] }" @endif
>
    @if ($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-secondary">{{ $label }}</label>
    @endif

    <label for="{{ $id }}" class="{{ sampaui_classes(['flex cursor-pointer flex-col items-center justify-center rounded-default border border-dashed border-secondary/50 bg-white px-6 py-8 text-center transition hover:border-primary hover:bg-light/30', 'border-danger ring-2 ring-danger/20' => filled($errorMessage), 'cursor-not-allowed opacity-50' => $disabled]) }}">
        <i class="bi bi-cloud-arrow-up text-2xl text-primary" aria-hidden="true"></i>
        <span class="mt-2 text-sm font-medium text-secondary">{{ trim($slot->toHtml()) !== '' ? $slot : 'Clique para selecionar arquivo' }}</span>
        <input
            id="{{ $id }}"
            type="file"
            @if ($name) name="{{ $name }}" @endif
            @if ($accept) accept="{{ $accept }}" @endif
            class="sr-only"
            @if ($multiple) multiple @endif
            @disabled($disabled)
            @if ($preview) x-on:change="files = Array.from($event.target.files || []).filter(file => file.type.startsWith('image/')).map(file => ({ name: file.name, url: URL.createObjectURL(file) }))" @endif
            {{ $attributes->except('class') }}
        >
    </label>

    @if ($preview)
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-4" x-show="files.length > 0" x-cloak>
            <template x-for="file in files" x-bind:key="file.url">
                <figure class="overflow-hidden rounded-default border border-light bg-white">
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
