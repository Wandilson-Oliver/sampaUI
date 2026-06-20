@props([
    'position' => 'top-right',
    'max' => 5,
    'duration' => 3500,
    'variant' => 'outline',
    'size' => 'md',
])

@php
    $positions = [
        'top-right' => 'top-4 right-4 sm:top-6 sm:right-6',
        'top-left' => 'top-4 left-4 sm:top-6 sm:left-6',
        'bottom-right' => 'right-4 bottom-4 sm:right-6 sm:bottom-6',
        'bottom-left' => 'bottom-4 left-4 sm:right-auto sm:bottom-6 sm:left-6',
    ];
    $positionClass = $positions[$position] ?? $positions['top-right'];
@endphp

<div
    x-data="SampaUI.toast({ max: {{ max((int) $max, 1) }}, defaultDuration: {{ max((int) $duration, 0) }}, variant: @js($variant), size: @js($size) })"
    x-on:toast.window="add($event.detail)"
    x-on:sampaui:toast.window="add($event.detail)"
    {{ $attributes->except(['x-data', 'x-on:toast.window', 'x-on:sampaui:toast.window'])->merge(['class' => "pointer-events-none fixed z-50 flex w-[calc(100%-2rem)] max-w-sm flex-col gap-3 {$positionClass}"]) }}
    aria-label="Notificacoes"
>
    <template x-for="toast in toasts" x-bind:key="toast.id">
        <div
            x-show="toast.show"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="translate-y-2 opacity-0"
            x-transition:enter-end="translate-y-0 opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="translate-y-1 opacity-0"
            class="pointer-events-auto overflow-hidden rounded-default shadow-lg shadow-secondary/10"
            x-bind:class="toast.wrap"
            x-on:mouseenter="pauseTimer(toast, 'pointer')"
            x-on:mouseleave="resumeTimer(toast, 'pointer')"
            x-on:focusin="pauseTimer(toast, 'focus')"
            x-on:focusout="if (!$el.contains($event.relatedTarget)) resumeTimer(toast, 'focus')"
            x-bind:role="toast.type === 'error' ? 'alert' : 'status'"
            x-bind:aria-live="toast.type === 'error' ? 'assertive' : 'polite'"
            aria-atomic="true"
            tabindex="0"
        >
            <div class="flex items-start gap-3" x-bind:class="toast.contentClass">
                <i class="bi mt-0.5 text-base" x-bind:class="[`bi-${toast.symbol}`, toast.icon]" aria-hidden="true"></i>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-semibold" x-text="toast.title"></p>
                    <p class="mt-1 text-sm leading-6" x-text="toast.message"></p>
                </div>
                <button type="button" class="inline-flex h-8 w-8 items-center justify-center rounded-full text-lg leading-none transition hover:bg-light/30 focus:outline-none focus:ring-2 focus:ring-primary/20" x-on:click="remove(toast.id)" aria-label="Fechar notificacao"><i class="bi bi-x-lg text-sm" aria-hidden="true"></i></button>
            </div>
            <div x-show="toast.duration > 0" class="h-1 w-full bg-light/40" aria-hidden="true"><div class="h-full transition-[width] duration-100 ease-linear" x-bind:class="toast.progressClass" x-bind:style="`width: ${toast.progress}%`"></div></div>
        </div>
    </template>
</div>
