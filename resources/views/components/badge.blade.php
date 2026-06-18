@props([
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'rounded' => true,
])

@php
    $sizes = [
        'xs' => 'gap-1 px-1.5 py-0.5 text-[0.6875rem] leading-4',
        'sm' => 'gap-1 px-2 py-0.5 text-xs leading-4',
        'md' => 'gap-1.5 px-2.5 py-1 text-sm leading-5',
        'lg' => 'gap-2 px-3 py-1.5 text-base leading-6',
    ];

    $classes = sampaui_classes([
        'inline-flex items-center border font-medium',
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
