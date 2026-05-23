@props([
    'type' => 'text',
    'label' => null,
    'name' => null,
    'value' => null,
    'placeholder' => null,
    'error' => null,
    'disabled' => false,
])

@php
    $id = $attributes->get('id') ?? $name ?? 'sampaui-input-'.uniqid();
    $errorBag = $errors ?? null;
    $errorMessage = $error ?: ($name && $errorBag?->has($name) ? $errorBag->first($name) : null);
    $classes = collect([
        'block w-full rounded-default border bg-white px-4 py-2.5 text-base text-secondary shadow-sm transition placeholder:text-secondary/50 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20',
        $errorMessage ? 'border-danger' : 'border-light',
        $disabled ? 'opacity-50 pointer-events-none' : null,
    ])->filter()->implode(' ');
@endphp

@if ($label)
    <label for="{{ $id }}" class="mb-2 block text-sm font-medium text-secondary">{{ $label }}</label>
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

@if ($errorMessage)
    <p id="{{ $id }}-error" class="mt-2 text-sm text-danger">{{ $errorMessage }}</p>
@endif
