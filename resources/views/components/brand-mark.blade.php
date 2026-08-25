@props([
    'icon' => null,
    'logo' => null,
    'alt' => null,
    'label' => null,
    'subtitle' => null,
    'badge' => null,
    'badgeVariant' => 'primary',
    'badgeAppearance' => 'soft',
    'href' => null,
    'navigate' => false,
    'size' => 'md',
    'layout' => 'horizontal',
])

@php
    $sizes = [
        'xs' => ['mark' => 'h-6 w-9', 'logo' => 'h-6 max-w-20', 'label' => 'text-sm font-semibold', 'subtitle' => 'text-[0.625rem]', 'gap' => 'gap-2'],
        'sm' => ['mark' => 'h-8 w-12', 'logo' => 'h-8 max-w-28', 'label' => 'text-base font-bold', 'subtitle' => 'text-xs', 'gap' => 'gap-2.5'],
        'md' => ['mark' => 'h-11 w-16', 'logo' => 'h-11 max-w-36', 'label' => 'text-xl font-bold', 'subtitle' => 'text-xs', 'gap' => 'gap-3'],
        'lg' => ['mark' => 'h-14 w-20', 'logo' => 'h-14 max-w-44', 'label' => 'text-2xl font-bold', 'subtitle' => 'text-sm', 'gap' => 'gap-3.5'],
        'xl' => ['mark' => 'h-16 w-24', 'logo' => 'h-16 max-w-52', 'label' => 'text-3xl font-bold', 'subtitle' => 'text-base', 'gap' => 'gap-4'],
        '2xl' => ['mark' => 'h-20 w-32', 'logo' => 'h-20 max-w-64', 'label' => 'text-4xl font-extrabold', 'subtitle' => 'text-lg', 'gap' => 'gap-5'],
    ];

    $selectedSize = $sizes[$size] ?? $sizes['md'];
    $tag = $href ? 'a' : 'span';
    $isStacked = $layout === 'vertical' || $layout === 'stacked';
    $accessibleLabel = filled($alt) ? $alt : (filled($label) ? $label : 'SampaUI');
    $hasText = filled($label) || filled($subtitle) || $slot->isNotEmpty();
@endphp

<{{ $tag }}
    @if ($href)
        href="{{ $href }}"
        aria-label="{{ $accessibleLabel }}"
        @if ($navigate) wire:navigate @endif
    @endif
    {{ $attributes->merge(['class' => 'inline-flex shrink-0 ' . ($isStacked ? 'flex-col items-center text-center ' . $selectedSize['gap'] : 'items-center ' . $selectedSize['gap']) . ' text-secondary group transition']) }}
>
    @if (isset($mark))
        {{ $mark }}
    @elseif ($logo)
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

    @if ($hasText)
        <span class="inline-flex min-w-0 {{ $isStacked ? 'flex-col items-center' : 'flex-col' }}">
            <span class="inline-flex items-center gap-2">
                @if ($label)
                    <span class="{{ $selectedSize['label'] }} truncate tracking-tight text-secondary group-hover:text-primary transition-colors">
                        {{ $label }}
                    </span>
                @endif

                @if ($slot->isNotEmpty() && ! $label)
                    {{ $slot }}
                @endif

                @if ($badge)
                    <x-sampaui::badge :variant="$badgeVariant" :appearance="$badgeAppearance" size="xs">
                        {{ $badge }}
                    </x-sampaui::badge>
                @endif
            </span>

            @if ($subtitle)
                <span class="{{ $selectedSize['subtitle'] }} font-medium text-secondary/60 truncate">
                    {{ $subtitle }}
                </span>
            @endif
        </span>
    @endif
</{{ $tag }}>

