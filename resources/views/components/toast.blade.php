@props([
    'position' => 'top-right',
    'max' => 5,
])

@php
    $positions = [
        'top-right' => 'top-4 right-4 sm:top-6 sm:right-6',
        'top-left' => 'top-4 left-4 sm:top-6 sm:left-6',
        'bottom-right' => 'right-4 bottom-4 sm:right-6 sm:bottom-6',
        'bottom-left' => 'bottom-4 left-4 sm:bottom-6 sm:left-6',
    ];

    $positionClass = $positions[$position] ?? $positions['top-right'];
@endphp

<div
    x-data="{
        toasts: [],
        max: {{ (int) $max }},
        add(payload) {
            const incoming = typeof payload === 'string' ? { message: payload } : (payload ?? {});
            const allowedTypes = ['success', 'error', 'warning', 'info'];
            const type = allowedTypes.includes(incoming.type) ? incoming.type : 'info';
            const duration = Number(incoming.duration ?? 3500);
            const id = `${Date.now()}-${Math.random()}`;
            const tones = {
                success: {
                    wrap: 'border border-success bg-white text-secondary',
                    icon: 'text-success',
                    progress: 'bg-success',
                    symbol: 'check2-circle',
                    title: 'Sucesso',
                },
                error: {
                    wrap: 'border border-danger bg-white text-secondary',
                    icon: 'text-danger',
                    progress: 'bg-danger',
                    symbol: 'exclamation-octagon',
                    title: 'Erro',
                },
                warning: {
                    wrap: 'border border-warning bg-white text-secondary',
                    icon: 'text-warning',
                    progress: 'bg-warning',
                    symbol: 'exclamation-triangle',
                    title: 'Atencao',
                },
                info: {
                    wrap: 'border border-info bg-white text-secondary',
                    icon: 'text-info',
                    progress: 'bg-info',
                    symbol: 'info-circle',
                    title: 'Aviso',
                },
            };
            const tone = tones[type];
            const toast = {
                id,
                show: true,
                type,
                title: incoming.title ?? tone.title,
                message: incoming.message ?? '',
                duration: Number.isFinite(duration) && duration >= 0 ? duration : 3500,
                progress: 100,
                timerId: null,
                intervalId: null,
                wrap: [tone.wrap, incoming.class].filter(Boolean).join(' '),
                icon: tone.icon,
                progressClass: tone.progress,
                symbol: tone.symbol,
            };

            this.toasts.unshift(toast);
            const reactiveToast = this.toasts[0];

            while (this.toasts.length > this.max) {
                const olderToast = this.toasts.pop();
                this.clearTimers(olderToast);
            }

            this.startTimer(reactiveToast);
        },
        startTimer(toast) {
            if (toast.duration === 0) {
                return;
            }

            const startedAt = Date.now();
            toast.intervalId = window.setInterval(() => {
                const elapsed = Date.now() - startedAt;
                toast.progress = Math.max(100 - ((elapsed / toast.duration) * 100), 0);
            }, 80);

            toast.timerId = window.setTimeout(() => this.remove(toast.id), toast.duration);
        },
        pauseTimer(toast) {
            this.clearTimers(toast);
        },
        resumeTimer(toast) {
            if (toast.duration === 0 || ! toast.show || toast.progress <= 0) {
                return;
            }

            toast.duration = Math.max((toast.duration * toast.progress) / 100, 350);
            this.startTimer(toast);
        },
        clearTimers(toast) {
            if (! toast) {
                return;
            }

            if (toast.timerId !== null) {
                window.clearTimeout(toast.timerId);
                toast.timerId = null;
            }

            if (toast.intervalId !== null) {
                window.clearInterval(toast.intervalId);
                toast.intervalId = null;
            }
        },
        remove(id) {
            const index = this.toasts.findIndex((item) => item.id === id);

            if (index < 0) {
                return;
            }

            this.clearTimers(this.toasts[index]);
            this.toasts[index].show = false;

            window.setTimeout(() => {
                const removeIndex = this.toasts.findIndex((item) => item.id === id);

                if (removeIndex >= 0) {
                    this.toasts.splice(removeIndex, 1);
                }
            }, 180);
        }
    }"
    x-on:toast.window="add($event.detail)"
    {{ $attributes->except(['x-data', 'x-on:toast.window'])->merge(['class' => "pointer-events-none fixed z-50 flex w-full max-w-sm flex-col gap-3 {$positionClass}"]) }}
>
    <template x-for="toast in toasts" :key="toast.id">
        <div
            x-show="toast.show"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="translate-y-2 opacity-0"
            x-transition:enter-end="translate-y-0 opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="translate-y-1 opacity-0"
            class="pointer-events-auto overflow-hidden rounded-default"
            :class="toast.wrap"
            @mouseenter="pauseTimer(toast)"
            @mouseleave="resumeTimer(toast)"
            role="status"
            aria-live="polite"
        >
            <div class="flex items-start gap-3 px-4 py-4">
                <i class="bi mt-0.5 text-base" :class="[`bi-${toast.symbol}`, toast.icon]" aria-hidden="true"></i>

                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium text-primary" x-text="toast.title"></p>
                    <p class="mt-1 text-sm leading-6 text-secondary" x-text="toast.message"></p>
                </div>

                <button
                    type="button"
                    class="cursor-pointer text-lg leading-none text-secondary transition hover:text-primary"
                    @click="remove(toast.id)"
                    aria-label="Fechar notificacao"
                >&times;</button>
            </div>

            <div x-show="toast.duration > 0" class="h-1 w-full bg-light">
                <div class="h-full transition-[width] duration-100 ease-linear" :class="toast.progressClass" :style="`width: ${toast.progress}%`"></div>
            </div>
        </div>
    </template>
</div>
