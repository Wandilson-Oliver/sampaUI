@props([
    'label' => null,
    'name' => null,
    'placeholder' => null,
    'error' => null,
    'disabled' => false,
])

@php
    $id = $attributes->get('id') ?? $name ?? 'sampaui-select-'.uniqid();
    $errorBag = $errors ?? null;
    $errorMessage = $error ?: ($name && $errorBag?->has($name) ? $errorBag->first($name) : null);
    $classes = collect([
        'block w-full appearance-none rounded-default border bg-white px-4 py-2.5 pr-11 text-base text-secondary shadow-sm transition focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20',
        $errorMessage ? 'border-danger' : 'border-light',
        $disabled ? 'opacity-50 pointer-events-none' : null,
    ])->filter()->implode(' ');
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
