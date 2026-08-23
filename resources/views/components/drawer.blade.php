@props([
    'model' => null,
    'title' => null,
    'subtitle' => null,
    'placement' => 'right',
    'size' => 'md',
    'variant' => 'default',
    'persistent' => false,
    'closeOnEscape' => null,
    'closeOnOutside' => null,
    'closeButton' => true,
    'closeEvent' => null,
    'afterClose' => null,
    'panelClass' => null,
    'backdropClass' => null,
])

@php
    $wireModel = method_exists($attributes, 'wire') ? $attributes->wire('model')->value() : ($attributes->get('wire:model') ?? $attributes->get('wire:model.live'));
    $model = $model ?? $wireModel;
    $currentLivewire = app()->bound('livewire') ? app('livewire')->current() : null;
    $livewireId = is_object($currentLivewire) && method_exists($currentLivewire, 'getId')
        ? $currentLivewire->getId()
        : 'standalone';
    $modelKey = $model ?? 'drawer';
    $generatedId = preg_replace('/[^A-Za-z0-9\\-_:.]/', '-', "sampaui-drawer-{$livewireId}-{$modelKey}");
    $id = $attributes->get('id') ?? $attributes->get('name') ?? $generatedId;
    $titleId = $title ? $id.'-title' : null;
    $subtitleId = $subtitle ? $id.'-subtitle' : null;

    $normalizedPlacement = in_array($placement, ['left', 'right', 'top', 'bottom'], true) ? $placement : 'right';

    $sideSizes = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        '2xl' => 'max-w-2xl',
        'full' => 'max-w-full',
    ];

    $stackSizes = [
        'sm' => 'max-h-[18rem]',
        'md' => 'max-h-[24rem]',
        'lg' => 'max-h-[32rem]',
        'xl' => 'max-h-[40rem]',
        '2xl' => 'max-h-[48rem]',
        'full' => 'max-h-full',
    ];

    $placements = [
        'left' => [
            'root' => 'items-stretch justify-start',
            'panel' => 'h-full w-full rounded-r-default',
            'hidden' => '-translate-x-full opacity-0',
        ],
        'right' => [
            'root' => 'items-stretch justify-end',
            'panel' => 'h-full w-full rounded-l-default',
            'hidden' => 'translate-x-full opacity-0',
        ],
        'top' => [
            'root' => 'items-start justify-stretch',
            'panel' => 'max-h-full w-full rounded-b-default',
            'hidden' => '-translate-y-full opacity-0',
        ],
        'bottom' => [
            'root' => 'items-end justify-stretch',
            'panel' => 'max-h-full w-full rounded-t-default',
            'hidden' => 'translate-y-full opacity-0',
        ],
    ];

    $variants = [
        'default' => 'border-border',
        'primary' => 'border-primary',
        'secondary' => 'border-secondary',
        'accent' => 'border-accent',
        'danger' => 'border-danger',
        'success' => 'border-success',
        'warning' => 'border-warning',
        'info' => 'border-info',
        'purple' => 'border-purple',
        'muted' => 'border-muted',
    ];

    $placementUi = $placements[$normalizedPlacement];
    $panelHidden = $placementUi['hidden'];
    $panelSize = in_array($normalizedPlacement, ['left', 'right'], true)
        ? ($sideSizes[$size] ?? $sideSizes['md'])
        : ($stackSizes[$size] ?? $stackSizes['md']);
    $panelTone = $variants[$variant] ?? $variants['default'];
    $closeDelay = 520;
    $escapeEnabled = is_null($closeOnEscape) ? ! $persistent : (bool) $closeOnEscape;
    $outsideEnabled = is_null($closeOnOutside) ? ! $persistent : (bool) $closeOnOutside;
    $hasHeader = filled($title) || filled($subtitle) || isset($header) || $closeButton;
    $resolvedBackdropClass = $backdropClass ?? 'bg-secondary/25 backdrop-blur-[2px]';
@endphp

<div
    style="display: contents;"
    x-data="SampaUI.overlay({
        serverOpen: @if(filled($model)) $wire.entangle(@js($model)).live @else false @endif,
        closeDelay: {{ $closeDelay }},
        closeOnEscape: @js($escapeEnabled),
        closeOnOutside: @js($outsideEnabled),
        afterClose: @js($afterClose),
    })"
    x-on:open-drawer.window="if (!$event.detail || $event.detail === '{{ $id }}' || $event.detail?.id === '{{ $id }}' || $event.detail?.name === '{{ $id }}'@if(filled($model)) || $event.detail === '{{ $model }}' || $event.detail?.model === '{{ $model }}' || $event.detail?.name === '{{ $model }}'@endif || '{{ $id }}'.endsWith('-' + ($event.detail?.id || $event.detail?.name || $event.detail))) openOverlay()"
    x-on:open-drawer-{{ $id }}.window="openOverlay()"
    x-on:close-drawer.window="if (!$event.detail || $event.detail === '{{ $id }}' || $event.detail?.id === '{{ $id }}' || $event.detail?.name === '{{ $id }}'@if(filled($model)) || $event.detail === '{{ $model }}' || $event.detail?.model === '{{ $model }}' || $event.detail?.name === '{{ $model }}'@endif || '{{ $id }}'.endsWith('-' + ($event.detail?.id || $event.detail?.name || $event.detail))) close()"
    x-on:close-drawer-{{ $id }}.window="close()"
>
    <template x-teleport="body">
        <div
            id="{{ $id }}"
            x-show="visible"
            role="dialog"
            aria-modal="true"
            @if ($titleId) aria-labelledby="{{ $titleId }}" @endif
            @if ($subtitleId) aria-describedby="{{ $subtitleId }}" @endif
            @keydown.escape.window="handleEscape()"
            @if ($closeEvent)
                x-on:{{ $closeEvent }}.window="close()"
            @endif
            data-sampaui-overlay
            x-bind:data-sampaui-overlay-active="visible ? 'true' : 'false'"
            x-bind:style="{ zIndex: layer }"
            {{ $attributes->except('id')->merge(['class' => "fixed inset-0 flex {$placementUi['root']}"]) }}
        >
            <div
                class="absolute inset-0 {{ $resolvedBackdropClass }} transition-[backdrop-filter,opacity] duration-500 ease-out"
                x-bind:class="active ? 'opacity-100' : 'opacity-0 backdrop-blur-none'"
                @click="handleOutside()"
                aria-hidden="true"
            ></div>

            <section
                x-ref="panel"
                tabindex="-1"
                x-on:keydown.tab="trapTab($event)"
                class="relative flex {{ $placementUi['panel'] }} {{ $panelSize }} border {{ $panelTone }} {{ $panelClass }} flex-col overflow-hidden bg-surface shadow-2xl shadow-secondary/15 outline-none transition duration-500 ease-[cubic-bezier(0.22,1,0.36,1)]"
                style="will-change: transform, opacity;"
                x-bind:class="active ? 'translate-x-0 translate-y-0 opacity-100' : '{{ $panelHidden }}'"
            >
                @if ($hasHeader)
                    <header class="flex items-start justify-between gap-4 border-b border-border px-5 py-4">
                        <div class="min-w-0">
                            @isset($header)
                                {{ $header }}
                            @else
                                @if ($title)
                                    <h2 id="{{ $titleId }}" class="text-lg font-semibold text-secondary">{{ $title }}</h2>
                                @endif

                                @if ($subtitle)
                                    <p id="{{ $subtitleId }}" class="mt-1 text-sm leading-6 text-secondary/70">{{ $subtitle }}</p>
                                @endif
                            @endisset
                        </div>

                        @if ($closeButton)
                            <button
                                type="button"
                                class="inline-flex h-10 w-10 shrink-0 cursor-pointer items-center justify-center rounded-full text-xl leading-none text-secondary/70 transition hover:bg-light hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/20"
                                aria-label="Fechar drawer"
                                @click="close()"
                            >
                                <i class="bi bi-x-lg text-base" aria-hidden="true"></i>
                            </button>
                        @endif
                    </header>
                @endif

                <div class="min-h-0 flex-1 overflow-y-auto px-5 py-5 text-secondary">
                    {{ $slot }}
                </div>

                @isset($actions)
                    <footer class="flex flex-wrap justify-end gap-3 border-t border-border bg-light/40 px-5 py-4">
                        {{ $actions }}
                    </footer>
                @endisset
            </section>
        </div>
    </template>
</div>
