@props([
    'title' => null,
    'description' => null,
    'variant' => 'default',
    'appearance' => 'outline',
    'padding' => 'md',
    'divided' => false,
    'overflow' => 'visible',
])

@php
    $paddings = [
        'none' => 'p-0',
        'sm' => 'px-4 py-4',
        'md' => 'px-5 py-5',
        'lg' => 'px-6 py-6',
    ];
    $headerPaddings = [
        'none' => 'p-0',
        'sm' => 'px-4 pt-4',
        'md' => 'px-5 pt-5',
        'lg' => 'px-6 pt-6',
    ];
    $bodyAfterHeaderPaddings = [
        'none' => 'p-0',
        'sm' => 'px-4 pb-4 pt-[15px]',
        'md' => 'px-5 pb-5 pt-[15px]',
        'lg' => 'px-6 pb-6 pt-[15px]',
    ];
    $horizontalPaddings = [
        'none' => '0px',
        'sm' => '1rem',
        'md' => '1.25rem',
        'lg' => '1.5rem',
    ];

    $pad = $paddings[$padding] ?? $paddings['md'];
    $headerPad = $headerPaddings[$padding] ?? $headerPaddings['md'];
    $bodyPad = $bodyAfterHeaderPaddings[$padding] ?? $bodyAfterHeaderPaddings['md'];
    $horizontalPadding = $horizontalPaddings[$padding] ?? $horizontalPaddings['md'];
    $tone = sampaui_surface_variant_classes($variant);
    $solidTones = [
        'default' => 'border-secondary bg-secondary text-white dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100',
        'muted' => 'border-muted bg-muted text-white dark:border-slate-700 dark:bg-slate-700 dark:text-slate-100',
        'neutral' => 'border-slate-700 bg-slate-800 text-white dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100',
        'primary' => 'border-primary bg-primary text-white',
        'secondary' => 'border-secondary bg-secondary text-white dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100',
        'accent' => 'border-accent bg-accent text-white',
        'danger' => 'border-danger bg-danger text-white',
        'success' => 'border-success bg-success text-white',
        'warning' => 'border-warning bg-warning text-white',
        'info' => 'border-info bg-info text-white',
        'purple' => 'border-purple bg-purple text-white',
    ];
    $softTones = [
        'default' => 'border-border bg-light/40 text-secondary dark:border-slate-800 dark:bg-slate-800/40 dark:text-slate-100',
        'muted' => 'border-muted/30 bg-muted/10 text-secondary dark:border-slate-800 dark:bg-slate-800/60 dark:text-slate-200',
        'neutral' => 'border-slate-200 bg-slate-100/60 text-slate-800 dark:border-slate-800 dark:bg-slate-800/60 dark:text-slate-200',
        'primary' => 'border-primary/25 bg-primary/10 text-secondary dark:border-primary/30 dark:bg-primary/15 dark:text-slate-100',
        'secondary' => 'border-secondary/40 bg-secondary/10 text-secondary dark:border-slate-700 dark:bg-slate-800/60 dark:text-slate-100',
        'accent' => 'border-accent/30 bg-accent/10 text-secondary dark:border-accent/30 dark:bg-accent/15 dark:text-slate-100',
        'danger' => 'border-danger/30 bg-danger/10 text-secondary dark:border-danger/30 dark:bg-danger/15 dark:text-slate-100',
        'success' => 'border-success/30 bg-success/10 text-secondary dark:border-success/30 dark:bg-success/15 dark:text-slate-100',
        'warning' => 'border-warning/30 bg-warning/10 text-secondary dark:border-warning/30 dark:bg-warning/15 dark:text-slate-100',
        'info' => 'border-info/30 bg-info/10 text-secondary dark:border-info/30 dark:bg-info/15 dark:text-slate-100',
        'purple' => 'border-purple/30 bg-purple/10 text-secondary dark:border-purple/30 dark:bg-purple/15 dark:text-slate-100',
    ];
    $tone = match ($appearance) {
        'solid' => $solidTones[$variant] ?? $solidTones['default'],
        'soft' => $softTones[$variant] ?? $softTones['default'],
        default => $tone,
    };
    $overflowClass = match ($overflow) {
        'auto' => 'overflow-auto',
        'hidden' => 'overflow-hidden',
        default => 'overflow-visible',
    };
    $hasHeader = filled($title) || filled($description) || isset($header) || isset($actions);
    $customClasses = (string) $attributes->get('class', '');
    $baseClasses = sampaui_classes([
        'rounded-default border',
        $overflowClass,
        $tone,
    ]);
    $classes = sampaui_merge_tailwind_classes($baseClasses, $customClasses);
    $titleClass = $appearance === 'solid' ? 'text-white' : 'text-primary dark:text-slate-100';
    $descriptionClass = $appearance === 'solid' ? 'text-white/80' : 'text-secondary/70 dark:text-slate-400';
@endphp

<div {{ $attributes->except('class')->merge(['class' => $classes]) }}>
    @if ($hasHeader)
        <div class="{{ $headerPad }}">
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
            <div class="mx-5 mt-[15px] h-px bg-border dark:bg-slate-800"></div>
        @endif
    @endif

    <div
        class="{{ $hasHeader && ! $divided ? $bodyPad : $pad }}"
        style="--sampaui-card-padding-x: {{ $horizontalPadding }};"
    >
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="h-px w-full bg-border dark:bg-slate-800"></div>
        <div class="{{ $pad }}">
            {{ $footer }}
        </div>
    @endisset
</div>
