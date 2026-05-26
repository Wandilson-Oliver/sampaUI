@props([
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'rounded' => true,
])

@php
    $variants = [
        'primary' => 'border-primary/25 bg-primary/10 text-primary',
        'secondary' => 'border-secondary/25 bg-secondary/10 text-secondary',
        'accent' => 'border-accent/30 bg-accent/10 text-accent',
        'danger' => 'border-danger/30 bg-danger/10 text-danger',
        'light' => 'border-light bg-light text-secondary',
        'success' => 'border-primary/25 bg-primary/10 text-primary',
        'warning' => 'border-accent/30 bg-accent/10 text-accent',
        'info' => 'border-secondary/25 bg-secondary/10 text-secondary',
    ];

    $sizes = [
        'sm' => 'px-2 py-0.5 text-xs',
        'md' => 'px-2.5 py-1 text-sm',
        'lg' => 'px-3 py-1.5 text-base',
    ];

    $classes = sampaui_classes([
        'inline-flex items-center gap-1.5 border font-medium leading-none',
        $variants[$variant] ?? $variants['primary'],
        $sizes[$size] ?? $sizes['md'],
        $rounded ? 'rounded-full' : 'rounded-default',
    ]);
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    @if ($icon)
        <i class="bi bi-{{ $icon }}" aria-hidden="true"></i>
    @endif

    {{ $slot }}
</span>
