@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'rows' => 4,
    'minRows' => null,
    'maxRows' => null,
    'placeholder' => null,
    'hint' => null,
    'error' => null,
    'state' => null,
    'disabled' => false,
    'readonly' => false,
    'loading' => false,
    'loadingTarget' => null,
    'required' => false,
    'autoResize' => false,
    'counter' => false,
    'maxlength' => null,
    'clearable' => false,
    'clearLabel' => 'Limpar',
    'copyable' => false,
    'copyLabel' => 'Copiar',
    'resize' => 'vertical',
])

@php
    $fieldName = sampaui_field_name($attributes, $name);
    $id = sampaui_id($attributes, $fieldName, 'sampaui-textarea');
    $errorMessage = sampaui_error($fieldName, $error, $errors ?? null);
    $describedBy = sampaui_described_by($id, $hint, $errorMessage, $attributes->get('aria-describedby'));
    $initialValue = (string) old($fieldName, $value ?? $slot->toHtml());
    $maxLimit = $maxlength ? (int) $maxlength : null;
    $showCounter = $counter || ! is_null($maxLimit);
    $effectiveRows = $minRows ?? $rows;

    $resizeClasses = match ($resize) {
        'none' => 'resize-none',
        'horizontal', 'x' => 'resize-x',
        'both' => 'resize',
        default => $autoResize ? 'resize-none' : 'resize-y',
    };

    $classes = sampaui_field_classes($errorMessage, $disabled, [
        'min-h-[5.5rem] py-2.5',
        $resizeClasses,
        $attributes->get('class'),
    ], $state, $readonly, $loading);

    $modelAttributes = $attributes->filter(
        fn (mixed $val, string $key): bool => str_starts_with($key, 'wire:model') || $key === 'x-model'
    );

    $controlAttributes = $attributes
        ->whereDoesntStartWith('wire:model')
        ->whereDoesntStartWith('x-model')
        ->except(['id', 'class', 'aria-describedby']);
@endphp

<x-sampaui::field :id="$id" :label="$label" :hint="$hint" :error="$errorMessage" :required="$required">
    <div
        {{ $modelAttributes }}
        x-data="{
            value: @js($initialValue),
            autoResize: @js((bool) $autoResize),
            maxLimit: @js($maxLimit),
            maxRows: @js($maxRows ? (int) $maxRows : null),
            copied: false,
            resize() {
                if (! this.autoResize) return;
                this.$nextTick(() => {
                    const el = this.$refs.control;
                    if (! el) return;
                    el.style.height = 'auto';
                    const lineHeight = 24;
                    const maxHeight = this.maxRows ? (this.maxRows * lineHeight) + 20 : null;
                    const calculated = el.scrollHeight + 2;

                    if (maxHeight && calculated > maxHeight) {
                        el.style.height = maxHeight + 'px';
                        el.style.overflowY = 'auto';
                    } else {
                        el.style.height = calculated + 'px';
                        el.style.overflowY = 'hidden';
                    }
                });
            },
            init() {
                this.resize();
                this.$watch('value', () => this.resize());
            },
            clear() {
                this.value = '';
                if (this.$refs.control) {
                    this.$refs.control.value = '';
                    this.$refs.control.dispatchEvent(new Event('input', { bubbles: true }));
                    this.$refs.control.dispatchEvent(new Event('change', { bubbles: true }));
                }
                this.resize();
            },
            copy() {
                if (! this.value) return;
                navigator.clipboard.writeText(this.value).then(() => {
                    this.copied = true;
                    setTimeout(() => { this.copied = false; }, 2000);
                });
            },
            get charCount() {
                return (this.value || '').length;
            },
            get counterColorClass() {
                if (! this.maxLimit) return 'text-secondary/70';
                const ratio = this.charCount / this.maxLimit;
                if (ratio >= 1) return 'text-danger font-bold';
                if (ratio >= 0.9) return 'text-warning font-semibold';
                return 'text-secondary/70';
            }
        }"
        class="relative w-full"
    >
        @isset($header)
            <div class="mb-1.5 flex items-center justify-between">
                {{ $header }}
            </div>
        @endisset

        <textarea
            x-ref="control"
            id="{{ $id }}"
            rows="{{ $effectiveRows }}"
            @if ($name) name="{{ $name }}" @endif
            @if ($placeholder) placeholder="{{ $placeholder }}" @endif
            @if ($maxLimit) maxlength="{{ $maxLimit }}" @endif
            @disabled($disabled || $loading)
            @readonly($readonly)
            @required($required)
            @if ($loadingTarget) wire:loading.attr="disabled" wire:target="{{ $loadingTarget }}" @endif
            @if ($errorMessage) aria-invalid="true" @else aria-invalid="false" @endif
            @if ($describedBy) aria-describedby="{{ $describedBy }}" @endif
            @if ($loading) aria-busy="true" @endif
            x-model="value"
            x-on:input="resize()"
            {{ $controlAttributes->merge(['class' => $classes]) }}
        >{{ $initialValue }}</textarea>

        @if ($clearable || $copyable || $showCounter || isset($footer))
            <div class="mt-1.5 flex items-center justify-between gap-3 text-xs text-secondary/60">
                <div class="flex items-center gap-3">
                    @if ($clearable)
                        <button
                            type="button"
                            x-show="value && value.length > 0"
                            x-cloak
                            x-on:click="clear()"
                            class="inline-flex cursor-pointer items-center gap-1 font-medium text-secondary/70 transition hover:text-danger focus:outline-none"
                            aria-label="{{ $clearLabel }}"
                        >
                            <i class="bi bi-x-circle text-xs" aria-hidden="true"></i>
                            <span>{{ $clearLabel }}</span>
                        </button>
                    @endif

                    @if ($copyable)
                        <button
                            type="button"
                            x-show="value && value.length > 0"
                            x-cloak
                            x-on:click="copy()"
                            class="inline-flex cursor-pointer items-center gap-1 font-medium text-secondary/70 transition hover:text-primary focus:outline-none"
                            aria-label="{{ $copyLabel }}"
                        >
                            <i class="bi" x-bind:class="copied ? 'bi-check2 text-emerald-500' : 'bi-copy'" aria-hidden="true"></i>
                            <span x-text="copied ? 'Copiado!' : @js($copyLabel)"></span>
                        </button>
                    @endif

                    @isset($footer)
                        {{ $footer }}
                    @endisset
                </div>

                @if ($showCounter)
                    <div
                        class="ml-auto flex items-center gap-1 font-mono text-xs transition-colors"
                        x-bind:class="counterColorClass"
                        aria-live="polite"
                    >
                        <span x-text="charCount">0</span>
                        @if ($maxLimit)
                            <span>/</span>
                            <span>{{ $maxLimit }}</span>
                        @else
                            <span>caracteres</span>
                        @endif
                    </div>
                @endif
            </div>
        @endif
    </div>
</x-sampaui::field>
