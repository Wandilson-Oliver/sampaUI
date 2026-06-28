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
        'sm' => ['mark' => 'h-8 w-12', 'logo' => 'h-8 max-w-28', 'scale' => 'scale-[0.72]', 'label' => 'text-base'],
        'md' => ['mark' => 'h-11 w-16', 'logo' => 'h-11 max-w-36', 'scale' => 'scale-100', 'label' => 'text-xl'],
        'lg' => ['mark' => 'h-14 w-20', 'logo' => 'h-14 max-w-44', 'scale' => 'scale-125', 'label' => 'text-2xl'],
        'xl' => ['mark' => 'h-16 w-24', 'logo' => 'h-16 max-w-52', 'scale' => 'scale-150', 'label' => 'text-3xl'],
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
        <span class="{{ $selectedSize['mark'] }} relative inline-block shrink-0" aria-hidden="true">
            <span class="{{ $selectedSize['scale'] }} absolute left-0 top-1/2 block h-11 w-16 origin-left -translate-y-1/2">
                <span class="absolute left-0 top-0 h-9 w-7 rounded-[1.15rem] rounded-br-md bg-primary"></span>
                <span class="absolute left-7 top-0 h-9 w-7 rounded-[1.15rem] bg-light"></span>
                <span class="absolute bottom-0 left-0 h-6 w-7 rounded-br-[1.4rem] rounded-tl-[1.4rem] bg-secondary"></span>
                <span class="absolute left-[1.62rem] top-7 h-3 w-3 rounded-full bg-accent"></span>

                @if ($icon)
                    <span class="absolute inset-0 flex items-center justify-center text-white">
                        <i class="bi bi-{{ $icon }} text-lg leading-none"></i>
                    </span>
                @endif
            </span>
        </span>
    @endif

    @if ($label)
        <span class="{{ $selectedSize['label'] }} truncate font-bold tracking-tight text-secondary">{{ $label }}</span>
    @endif
</{{ $tag }}>
