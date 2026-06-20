@props([
    'model',
    'title' => null,
    'subtitle' => null,
    'size' => 'lg',
    'variant' => 'default',
    'persistent' => false,
    'closeOnEscape' => null,
    'closeOnOutside' => null,
    'closeButton' => true,
    'closeEvent' => null,
    'afterClose' => null,
    'panelClass' => null,
])

@php
    $id = $attributes->get('id') ?? 'sampaui-modal-'.uniqid();
    $titleId = $title ? $id.'-title' : null;
    $subtitleId = $subtitle ? $id.'-subtitle' : null;

    $sizes = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        '2xl' => 'max-w-2xl',
        '4xl' => 'max-w-4xl',
        '5xl' => 'max-w-5xl',
        '6xl' => 'max-w-6xl',
        '7xl' => 'max-w-7xl',
        'full' => 'max-w-[calc(100vw-2rem)]',
    ];

    $variants = [
        'default' => 'border-light',
        'primary' => 'border-primary',
        'secondary' => 'border-secondary',
        'accent' => 'border-accent',
        'danger' => 'border-danger',
    ];

    $panelSize = $sizes[$size] ?? $sizes['lg'];
    $panelTone = $variants[$variant] ?? $variants['default'];
    $closeDelay = 260;
    $escapeEnabled = is_null($closeOnEscape) ? ! $persistent : (bool) $closeOnEscape;
    $outsideEnabled = is_null($closeOnOutside) ? ! $persistent : (bool) $closeOnOutside;
    $hasHeader = filled($title) || filled($subtitle) || isset($header) || $closeButton;
@endphp

<div
    style="display: contents;"
    x-data="SampaUI.overlay({
        serverOpen: $wire.entangle({{ \Illuminate\Support\Js::from($model) }}).live,
        closeDelay: {{ $closeDelay }},
        closeOnEscape: @js($escapeEnabled),
        closeOnOutside: @js($outsideEnabled),
        afterClose: @js($afterClose),
    })"
>
    <dialog
        x-ref="dialog"
        id="{{ $id }}"
        x-cloak
        role="dialog"
        aria-modal="true"
        @if ($titleId) aria-labelledby="{{ $titleId }}" @endif
        @if ($subtitleId) aria-describedby="{{ $subtitleId }}" @endif
        @cancel.prevent="handleEscape()"
        @if ($closeEvent)
            x-on:{{ $closeEvent }}.window="close(false)"
        @endif
        {{ $attributes->except('id')->merge(['class' => 'fixed inset-0 z-[2147483647] m-0 h-screen min-h-dvh w-screen max-h-none max-w-none overflow-y-auto bg-transparent p-0 text-secondary outline-none backdrop:bg-primary/40 backdrop:backdrop-blur-[2px]']) }}
    >
        <div
            x-show="visible"
            x-transition:enter="transition-opacity duration-300 ease-out"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity duration-200 ease-in"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="flex min-h-dvh w-full items-center justify-center p-4 sm:p-6"
            @click.self="handleOutside()"
        >
            <section
                x-ref="panel"
                x-show="active"
                x-transition:enter="transition duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]"
                x-transition:enter-start="translate-x-6 -translate-y-6 scale-75 opacity-0"
                x-transition:enter-end="translate-y-0 scale-100 opacity-100"
                x-transition:leave="transition duration-200 ease-in"
                x-transition:leave-start="translate-y-0 scale-100 opacity-100"
                x-transition:leave-end="translate-x-6 -translate-y-6 scale-75 opacity-0"
                tabindex="-1"
                x-on:keydown.tab="trapTab($event)"
                class="relative flex max-h-[calc(100dvh-2rem)] w-full {{ $panelSize }} origin-top-right flex-col overflow-hidden rounded-default border {{ $panelTone }} {{ $panelClass }} bg-white outline-none"
            >
                @if ($hasHeader)
                    <header class="flex items-start justify-between gap-4 px-5 py-5">
                        <div class="min-w-0">
                            @isset($header)
                                {{ $header }}
                            @else
                                @if ($title)
                                    <h2 id="{{ $titleId }}" class="text-lg font-semibold text-primary">{{ $title }}</h2>
                                @endif

                                @if ($subtitle)
                                    <p id="{{ $subtitleId }}" class="mt-1 text-sm leading-6 text-secondary">{{ $subtitle }}</p>
                                @endif
                            @endisset
                        </div>

                        @if ($closeButton)
                            <button
                                type="button"
                                class="inline-flex h-10 w-10 shrink-0 cursor-pointer items-center justify-center rounded-full bg-white text-xl leading-none text-secondary transition hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/20"
                                aria-label="Fechar modal"
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
                    <footer class="flex flex-wrap justify-end gap-3 px-5 py-4">
                        {{ $actions }}
                    </footer>
                @endisset
            </section>
        </div>
    </dialog>
</div>
