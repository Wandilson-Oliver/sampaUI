@props([
    'label' => null,
    'name' => null,
    'value' => '1',
    'checked' => false,
    'error' => null,
    'disabled' => false,
])

@php
    $id = $attributes->get('id') ?? $name ?? 'sampaui-checkbox-'.uniqid();
    $errorBag = $errors ?? null;
    $errorMessage = $error ?: ($name && $errorBag?->has($name) ? $errorBag->first($name) : null);
    $classes = collect([
        'h-5 w-5 rounded border text-primary shadow-sm transition focus:ring-2 focus:ring-primary/20 focus:ring-offset-2',
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
