@props([
    'variant' => 'primary',
    'pulse' => false,
    'label' => null,
])

@php
    $variants = [
        'primary' => 'bg-primary',
        'secondary' => 'bg-secondary',
        'accent' => 'bg-accent',
        'danger' => 'bg-danger',
        'light' => 'bg-light',
        'success' => 'bg-primary',
        'warning' => 'bg-accent',
        'info' => 'bg-secondary',
    ];
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 text-sm font-medium text-secondary']) }}>
    <span class="relative inline-flex h-2.5 w-2.5">
        @if ($pulse)
            <span class="{{ sampaui_classes(['absolute inline-flex h-full w-full animate-ping rounded-full opacity-40', $variants[$variant] ?? $variants['primary']]) }}"></span>
        @endif
        <span class="{{ sampaui_classes(['relative inline-flex h-2.5 w-2.5 rounded-full', $variants[$variant] ?? $variants['primary']]) }}"></span>
    </span>
    @if ($label || trim($slot->toHtml()) !== '')
        <span>{{ $label ?? $slot }}</span>
    @endif
</span>
