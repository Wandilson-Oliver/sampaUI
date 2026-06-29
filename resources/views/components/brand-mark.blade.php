@props([
    'icon' => null,
    'logo' => null,
    'alt' => null,
    'label' => null,
    'href' => null,
    'size' => 'md',
])

@php
    $sizes = [
        'sm' => ['mark' => 'h-8 w-12', 'logo' => 'h-8 max-w-28', 'label' => 'text-base'],
        'md' => ['mark' => 'h-11 w-16', 'logo' => 'h-11 max-w-36', 'label' => 'text-xl'],
        'lg' => ['mark' => 'h-14 w-20', 'logo' => 'h-14 max-w-44', 'label' => 'text-2xl'],
        'xl' => ['mark' => 'h-16 w-24', 'logo' => 'h-16 max-w-52', 'label' => 'text-3xl'],
    ];
    $selectedSize = $sizes[$size] ?? $sizes['md'];
    $tag = $href ? 'a' : 'span';
    $accessibleLabel = filled($alt) ? $alt : (filled($label) ? $label : 'SampaUI');
@endphp

<{{ $tag }}
    @if ($href) href="{{ $href }}" aria-label="{{ $accessibleLabel }}" @endif
    {{ $attributes->merge(['class' => 'inline-flex shrink-0 items-center gap-3 text-secondary']) }}
>
    @if ($logo)
        <img
            src="{{ $logo }}"
            alt="{{ $alt ?? $label ?? '' }}"
            class="{{ $selectedSize['logo'] }} block w-auto shrink-0 object-contain"
        >
    @else
        <span class="{{ $selectedSize['mark'] }} relative inline-flex shrink-0 items-center justify-center" aria-hidden="true">
            <img
                src="{{ sampaui_asset('images/logo-sampaui-mark.png') }}"
                alt=""
                class="block h-full w-full object-contain"
            >

            @if ($icon)
                <span class="absolute inset-0 flex items-center justify-center text-white drop-shadow-sm">
                    <i class="bi bi-{{ $icon }} text-lg leading-none"></i>
                </span>
            @endif
        </span>
    @endif

    @if ($label)
        <span class="{{ $selectedSize['label'] }} truncate font-bold tracking-tight text-secondary">{{ $label }}</span>
    @endif
</{{ $tag }}>
