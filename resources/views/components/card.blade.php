@props([
    'title' => null,
    'description' => null,
    'variant' => 'default',
    'padding' => 'md',
    'divided' => false,
])

@php
    $paddings = [
        'sm' => 'px-4 py-4',
        'md' => 'px-5 py-5',
        'lg' => 'px-6 py-6',
    ];

    $pad = $paddings[$padding] ?? $paddings['md'];
    $tone = sampaui_surface_variant_classes($variant);
    $hasHeader = filled($title) || filled($description) || isset($header) || isset($actions);
    $classes = sampaui_classes([
        'overflow-hidden rounded-default border',
        $tone,
    ]);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    @if ($hasHeader)
        <div class="{{ $pad }}">
            <div class="flex items-start justify-between gap-4">
                <div class="min-w-0">
                    @isset($header)
                        {{ $header }}
                    @else
                        @if ($title)
                            <h3 class="text-base font-medium text-primary">{{ $title }}</h3>
                        @endif

                        @if ($description)
                            <p class="mt-1 text-sm leading-6 text-secondary">{{ $description }}</p>
                        @endif
                    @endisset
                </div>

                @isset($actions)
                    <div class="shrink-0">{{ $actions }}</div>
                @endisset
            </div>
        </div>

        @if ($divided)
            <div class="h-px w-full bg-light"></div>
        @endif
    @endif

    <div class="{{ $pad }}">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="h-px w-full bg-light"></div>
        <div class="{{ $pad }}">
            {{ $footer }}
        </div>
    @endisset
</div>
