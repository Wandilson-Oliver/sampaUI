@props([
    'title' => null,
    'description' => null,
    'variant' => 'default',
    'appearance' => 'outline',
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
    $solidTones = [
        'default' => 'border-secondary bg-secondary text-white',
        'muted' => 'border-muted bg-muted text-white',
        'primary' => 'border-primary bg-primary text-white',
        'secondary' => 'border-secondary bg-secondary text-white',
        'accent' => 'border-accent bg-accent text-white',
        'danger' => 'border-danger bg-danger text-white',
        'success' => 'border-success bg-success text-white',
        'warning' => 'border-warning bg-warning text-white',
        'info' => 'border-info bg-info text-white',
        'purple' => 'border-purple bg-purple text-white',
    ];
    $softTones = [
        'default' => 'border-light bg-light/40 text-secondary',
        'muted' => 'border-muted/30 bg-muted/10 text-secondary',
        'primary' => 'border-primary/25 bg-primary/10 text-secondary',
        'secondary' => 'border-secondary/40 bg-secondary/10 text-secondary',
        'accent' => 'border-accent/30 bg-accent/10 text-secondary',
        'danger' => 'border-danger/30 bg-danger/10 text-secondary',
        'success' => 'border-success/30 bg-success/10 text-secondary',
        'warning' => 'border-warning/30 bg-warning/10 text-secondary',
        'info' => 'border-info/30 bg-info/10 text-secondary',
        'purple' => 'border-purple/30 bg-purple/10 text-secondary',
    ];
    $tone = match ($appearance) {
        'solid' => $solidTones[$variant] ?? $solidTones['default'],
        'soft' => $softTones[$variant] ?? $softTones['default'],
        default => $tone,
    };
    $hasHeader = filled($title) || filled($description) || isset($header) || isset($actions);
    $classes = sampaui_classes([
        'overflow-hidden rounded-default border',
        $tone,
    ]);
    $titleClass = $appearance === 'solid' ? 'text-white' : 'text-primary';
    $descriptionClass = $appearance === 'solid' ? 'text-white/80' : 'text-secondary';
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
                            <h3 class="text-base font-medium {{ $titleClass }}">{{ $title }}</h3>
                        @endif

                        @if ($description)
                            <p class="mt-1 text-sm leading-6 {{ $descriptionClass }}">{{ $description }}</p>
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
