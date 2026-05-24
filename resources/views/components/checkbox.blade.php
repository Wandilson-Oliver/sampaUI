@props([
    'label' => null,
    'name' => null,
    'value' => '1',
    'checked' => false,
    'color' => 'primary',
    'error' => null,
    'disabled' => false,
])

@php
    $colorClasses = [
        'primary' => 'accent-primary text-primary focus:ring-primary/20',
        'secondary' => 'accent-secondary text-secondary focus:ring-secondary/20',
        'accent' => 'accent-accent text-accent focus:ring-accent/20',
        'danger' => 'accent-danger text-danger focus:ring-danger/20',
        'light' => 'accent-light text-secondary focus:ring-light/40',
    ];

    $id = $attributes->get('id') ?? $name ?? 'sampaui-checkbox-'.uniqid();
    $errorBag = $errors ?? null;
    $errorMessage = $error ?: ($name && $errorBag?->has($name) ? $errorBag->first($name) : null);
    $classes = collect([
        'h-5 w-5 rounded border shadow-sm transition focus:ring-2 focus:ring-offset-2',
        $colorClasses[$color] ?? $colorClasses['primary'],
        $errorMessage ? 'border-danger' : 'border-light',
        $disabled ? 'opacity-50 pointer-events-none' : null,
    ])->filter()->implode(' ');
@endphp

<div class="flex items-start gap-3">
    <input
        id="{{ $id }}"
        type="checkbox"
        value="{{ $value }}"
        @if ($name) name="{{ $name }}" @endif
        @checked($checked)
        @disabled($disabled)
        @if ($errorMessage) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
        {{ $attributes->except('id')->merge(['class' => $classes]) }}
    >

    @if ($label || trim($slot->toHtml()) !== '')
        <label for="{{ $id }}" class="text-sm font-medium text-secondary">
            {{ $label ?: $slot }}
        </label>
    @endif
</div>

@if ($errorMessage)
    <p id="{{ $id }}-error" class="mt-2 text-sm text-danger">{{ $errorMessage }}</p>
@endif
