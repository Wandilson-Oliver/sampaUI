@props([
    'type' => 'text',
    'label' => null,
    'name' => null,
    'value' => null,
    'placeholder' => null,
    'error' => null,
    'disabled' => false,
    'icon' => null,
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-input');
    $errorMessage = sampaui_error($name, $error, $errors ?? null);
    $hasPrefix = filled($icon) || isset($prefix);
    $hasSuffix = isset($suffix);
    $classes = sampaui_field_classes($errorMessage, $disabled, [
        'pl-11' => $hasPrefix,
        'pr-11' => $hasSuffix,
    ]);
@endphp

<div>
    @if ($label)
        <label for="{{ $id }}" class="mb-2 block text-sm font-medium text-secondary">{{ $label }}</label>
    @endif

    <div @class(['relative' => $hasPrefix || $hasSuffix])>
        @if ($hasPrefix)
            <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-secondary/60" aria-hidden="true">
                @isset($prefix)
                    {{ $prefix }}
                @else
                    <i class="bi bi-{{ $icon }}"></i>
                @endisset
            </span>
        @endif

        <input
            id="{{ $id }}"
            type="{{ $type }}"
            @if ($name) name="{{ $name }}" @endif
            @if (! is_null($value)) value="{{ $value }}" @endif
            @if ($placeholder) placeholder="{{ $placeholder }}" @endif
            @disabled($disabled)
            @if ($errorMessage) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
            {{ $attributes->except('id')->merge(['class' => $classes]) }}
        >

        @if ($hasSuffix)
            <span class="absolute inset-y-0 right-4 flex items-center text-secondary/60">
                {{ $suffix }}
            </span>
        @endif
    </div>

    @if ($errorMessage)
        <p id="{{ $id }}-error" class="mt-2 text-sm text-danger">{{ $errorMessage }}</p>
    @endif
</div>
