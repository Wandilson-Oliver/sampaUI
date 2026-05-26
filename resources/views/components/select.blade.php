@props([
    'label' => null,
    'name' => null,
    'placeholder' => null,
    'error' => null,
    'disabled' => false,
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-select');
    $errorMessage = sampaui_error($name, $error, $errors ?? null);
    $classes = sampaui_field_classes($errorMessage, $disabled, [
        'cursor-pointer appearance-none pr-11',
    ]);
@endphp

@if ($label)
    <label for="{{ $id }}" class="mb-2 block text-sm font-medium text-secondary">{{ $label }}</label>
@endif

<div class="relative">
    <select
        id="{{ $id }}"
        @if ($name) name="{{ $name }}" @endif
        @disabled($disabled)
        @if ($errorMessage) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
        {{ $attributes->except('id')->merge(['class' => $classes]) }}
    >
        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif

        {{ $slot }}
    </select>

    <span class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-secondary" aria-hidden="true">
        <i class="bi bi-chevron-down"></i>
    </span>
</div>

@if ($errorMessage)
    <p id="{{ $id }}-error" class="mt-2 text-sm text-danger">{{ $errorMessage }}</p>
@endif
