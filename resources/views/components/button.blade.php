@props([
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'iconPosition' => 'left',
    'rounded' => false,
    'loading' => false,
    'loadingTarget' => null,
    'disabled' => false,
    'full' => false,
    'type' => 'button',
    'href' => null,
])

@php
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
    $hasLoadingTarget = ! is_null($loadingTarget) && $loadingTarget !== false;
    $targetString = is_string($loadingTarget) && filled($loadingTarget) ? $loadingTarget : null;
    $customClasses = (string) $attributes->get('class', '');

    if ($isDisabled) {
        $customClasses = (string) preg_replace('/(?<!\S)cursor-[^\s]+/', '', $customClasses);
    }

    $classes = sampaui_merge_tailwind_classes(sampaui_classes([
        'inline-flex items-center justify-center gap-2 font-medium transition focus:outline-none focus:ring-2 focus:ring-primary/30 focus:ring-offset-2',
        sampaui_button_variant_classes($variant),
        $isIconOnly ? ($iconOnlySizeClasses[$size] ?? $iconOnlySizeClasses['md']).' aspect-square' : ($sizeClasses[$size] ?? $sizeClasses['md']),
        $rounded || $isIconOnly ? 'rounded-full' : 'rounded-default',
        $full ? 'w-full' : null,
        $isDisabled ? 'cursor-not-allowed opacity-50' : 'cursor-pointer',
    ]), $customClasses);
@endphp

<{{ $href ? 'a' : 'button' }}
    @if ($href && ! $isDisabled) href="{{ $href }}" @endif
    @if (! $href) type="{{ $type }}" @endif
    @if (! $href) @disabled($isDisabled) @endif
    @if ($href && $isDisabled) aria-disabled="true" tabindex="-1" @endif
    @if ($loading) aria-busy="true" @endif
    @if ($hasLoadingTarget)
        wire:loading.attr="disabled"
        wire:loading.attr.aria-busy="true"
        wire:loading.class="opacity-75 cursor-wait"
        @if ($targetString) wire:target="{{ $targetString }}" @endif
    @endif
    {{ $attributes->except('class')->merge(['class' => $classes]) }}
>
    @if ($loading)
        <i class="bi bi-arrow-repeat animate-spin" aria-hidden="true"></i>
    @else
        @if ($hasLoadingTarget)
            <i class="bi bi-arrow-repeat animate-spin" wire:loading @if($targetString) wire:target="{{ $targetString }}" @endif aria-hidden="true"></i>
        @endif

        @if ($icon && $iconPosition !== 'right')
            <i class="bi bi-{{ $icon }}" @if($hasLoadingTarget) wire:loading.remove @if($targetString) wire:target="{{ $targetString }}" @endif @endif aria-hidden="true"></i>
        @endif
    @endif

    {{ $slot }}

    @if (! $loading && $icon && $iconPosition === 'right')
        <i class="bi bi-{{ $icon }}" @if($hasLoadingTarget) wire:loading.remove @if($targetString) wire:target="{{ $targetString }}" @endif @endif aria-hidden="true"></i>
    @endif
</{{ $href ? 'a' : 'button' }}>
