@props([
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'rounded' => true,
])

@php
    $sizes = [
        'sm' => 'px-2 py-0.5 text-xs',
        'md' => 'px-2.5 py-1 text-sm',
        'lg' => 'px-3 py-1.5 text-base',
    ];

    $classes = sampaui_classes([
        'inline-flex items-center gap-1.5 border font-medium leading-none',
        sampaui_badge_variant_classes($variant),
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
