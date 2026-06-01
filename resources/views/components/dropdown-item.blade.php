@props([
    'href' => null,
    'icon' => null,
    'danger' => false,
    'disabled' => false,
])

@php
    $classes = sampaui_classes([
        'flex w-full cursor-pointer items-center gap-2 rounded-default px-3 py-2 text-left text-sm transition',
        $danger ? 'text-danger hover:bg-danger/10' : 'text-secondary hover:bg-light/50 hover:text-primary',
        'pointer-events-none cursor-not-allowed opacity-50' => $disabled,
    ]);
@endphp

@if ($href)
    <a href="{{ $href }}" role="menuitem" {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon)<i class="bi bi-{{ $icon }}" aria-hidden="true"></i>@endif
        {{ $slot }}
    </a>
@else
    <button type="button" role="menuitem" @disabled($disabled) {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon)<i class="bi bi-{{ $icon }}" aria-hidden="true"></i>@endif
        {{ $slot }}
    </button>
@endif
