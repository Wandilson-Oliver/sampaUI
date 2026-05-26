@props([
    'text' => null,
    'position' => 'top',
])

@php
    $positions = [
        'top' => 'bottom-full left-1/2 mb-2 -translate-x-1/2',
        'bottom' => 'left-1/2 top-full mt-2 -translate-x-1/2',
        'left' => 'right-full top-1/2 mr-2 -translate-y-1/2',
        'right' => 'left-full top-1/2 ml-2 -translate-y-1/2',
    ];
@endphp

<span {{ $attributes->merge(['class' => 'group relative inline-flex']) }}>
    {{ $slot }}
    <span class="pointer-events-none absolute {{ $positions[$position] ?? $positions['top'] }} z-50 whitespace-nowrap rounded-default bg-slate-950 px-2.5 py-1.5 text-xs font-medium text-white opacity-0 transition group-hover:opacity-100 group-focus-within:opacity-100" role="tooltip">
        {{ $text }}
    </span>
</span>
