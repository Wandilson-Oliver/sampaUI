@props([
    'src' => null,
    'name' => null,
    'alt' => null,
    'size' => 'md',
    'rounded' => true,
    'status' => null,
])

@php
    $sizes = [
        'xs' => ['box' => 'h-6 w-6 text-[0.625rem]', 'dot' => 'h-2 w-2'],
        'sm' => ['box' => 'h-8 w-8 text-xs', 'dot' => 'h-2.5 w-2.5'],
        'md' => ['box' => 'h-10 w-10 text-sm', 'dot' => 'h-3 w-3'],
        'lg' => ['box' => 'h-14 w-14 text-base', 'dot' => 'h-3.5 w-3.5'],
        'xl' => ['box' => 'h-16 w-16 text-lg', 'dot' => 'h-4 w-4'],
        '2xl' => ['box' => 'h-20 w-20 text-xl', 'dot' => 'h-5 w-5'],
    ];

    $statusClasses = [
        'online' => 'bg-success',
        'busy' => 'bg-danger',
        'away' => 'bg-accent',
        'offline' => 'bg-secondary/40',
    ];

    $selectedSize = $sizes[$size] ?? $sizes['md'];
    $initials = collect(explode(' ', trim((string) $name)))
        ->filter()
        ->take(2)
        ->map(fn (string $part) => \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($part, 0, 1)))
        ->implode('');
@endphp

<span {{ $attributes->merge(['class' => 'relative inline-flex shrink-0']) }}>
    <span class="{{ sampaui_classes(['inline-flex shrink-0 items-center justify-center overflow-hidden bg-light font-semibold text-primary', $selectedSize['box'], $rounded ? 'rounded-full' : 'rounded-default']) }}">
        @if ($src)
            <img src="{{ $src }}" alt="{{ $alt ?? $name ?? 'Avatar' }}" class="h-full w-full object-cover">
        @else
            {{ $initials ?: '?' }}
        @endif
    </span>

    @if ($status)
        <span class="{{ sampaui_classes(['absolute bottom-0 right-0 rounded-full border-2 border-white', $selectedSize['dot'], $statusClasses[$status] ?? $statusClasses['online']]) }}" aria-label="{{ $status }}"></span>
    @endif
</span>
