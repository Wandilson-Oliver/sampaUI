@props([
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'iconPosition' => 'left',
    'rounded' => false,
    'loading' => false,
    'disabled' => false,
    'full' => false,
    'type' => 'button',
])

@php
    $variantClasses = [
        'primary' => 'bg-primary text-white hover:opacity-90',
        'secondary' => 'bg-secondary text-white hover:opacity-90',
        'accent' => 'bg-accent text-white hover:opacity-90',
        'danger' => 'bg-danger text-white hover:opacity-90',
        'light' => 'bg-light text-secondary hover:opacity-90',
        'ghost' => 'bg-transparent text-secondary hover:bg-light/30',
        'outline' => 'bg-transparent border border-primary text-primary hover:bg-primary hover:text-white',
    ];

    $sizeClasses = [
        'sm' => 'px-3 py-2 text-sm',
        'md' => 'px-4 py-2.5 text-base',
        'lg' => 'px-5 py-3 text-lg',
        'xl' => 'px-6 py-4 text-xl',
        '2xl' => 'px-8 py-5 text-2xl',
    ];

    $iconOnlySizeClasses = [
        'sm' => 'w-8 h-8 text-sm',
        'md' => 'w-10 h-10 text-base',
        'lg' => 'w-12 h-12 text-lg',
        'xl' => 'w-14 h-14 text-xl',
        '2xl' => 'w-16 h-16 text-2xl',
    ];

    $isIconOnly = filled($icon) && trim($slot->toHtml()) === '';
    $isDisabled = $disabled || $loading;

    $classes = sampaui_classes([
        'inline-flex cursor-pointer items-center justify-center gap-2 font-medium transition focus:outline-none focus:ring-2 focus:ring-primary/30 focus:ring-offset-2',
        $variantClasses[$variant] ?? $variantClasses['primary'],
        $isIconOnly ? ($iconOnlySizeClasses[$size] ?? $iconOnlySizeClasses['md']).' aspect-square' : ($sizeClasses[$size] ?? $sizeClasses['md']),
        $rounded || $isIconOnly ? 'rounded-full' : 'rounded-default',
        $full ? 'w-full' : null,
        $isDisabled ? 'cursor-not-allowed opacity-50' : null,
    ]);
@endphp

<button
    type="{{ $type }}"
    @disabled($isDisabled)
    @if ($loading) aria-busy="true" @endif
    {{ $attributes->merge(['class' => $classes]) }}
>
    @if ($loading)
        <i class="bi bi-arrow-repeat animate-spin" aria-hidden="true"></i>
    @elseif ($icon && $iconPosition !== 'right')
        <i class="bi bi-{{ $icon }}" aria-hidden="true"></i>
    @endif

    {{ $slot }}

    @if (! $loading && $icon && $iconPosition === 'right')
        <i class="bi bi-{{ $icon }}" aria-hidden="true"></i>
    @endif
</button>
