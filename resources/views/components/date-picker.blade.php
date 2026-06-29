@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'min' => null,
    'max' => null,
    'placeholder' => null,
    'error' => null,
    'disabled' => false,
    'required' => false,
    'clearable' => false,
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-date-picker');
    $errorMessage = sampaui_error($name, $error, $errors ?? null);
    $classes = sampaui_trigger_classes($errorMessage, $disabled);

    $placeholderText = $placeholder ?: 'Selecione uma data';
    $modelAttributes = $attributes->filter(
        fn (mixed $attributeValue, string $attributeName): bool => str_starts_with($attributeName, 'wire:model') || $attributeName === 'x-model'
    );
    $inputAttributes = $attributes
        ->whereDoesntStartWith('wire:model')
        ->whereDoesntStartWith('x-model')
        ->except(['id', 'class']);
@endphp

<div
    class="relative"
    {{ $modelAttributes }}
    x-data="{
        open: false,
        value: @js((string) ($value ?? '')),
        min: @js($min),
        max: @js($max),
        placeholder: @js($placeholderText),
        month: null,
        weekDays: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
        init() {
            const initial = this.parseDate(this.value) || new Date();
            this.month = new Date(initial.getFullYear(), initial.getMonth(), 1);
        },
        parseDate(date) {
            if (! date || ! /^\d{4}-\d{2}-\d{2}$/.test(date)) {
                return null;
            }

            const [year, month, day] = date.split('-').map(Number);
            return new Date(year, month - 1, day);
        },
        toIso(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');

            return `${year}-${month}-${day}`;
        },
        displayValue() {
            const date = this.parseDate(this.value);

            if (! date) {
                return this.placeholder;
            }

            return new Intl.DateTimeFormat('pt-BR', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
            }).format(date);
        },
        monthLabel() {
            return new Intl.DateTimeFormat('pt-BR', {
                month: 'long',
                year: 'numeric',
            }).format(this.month);
        },
        days() {
            const first = new Date(this.month.getFullYear(), this.month.getMonth(), 1);
            const start = new Date(first);
            start.setDate(first.getDate() - first.getDay());

            return Array.from({ length: 42 }, (_, index) => {
                const date = new Date(start);
                date.setDate(start.getDate() + index);

                return {
                    date,
                    iso: this.toIso(date),
                    day: date.getDate(),
                    currentMonth: date.getMonth() === this.month.getMonth(),
                    today: this.toIso(date) === this.toIso(new Date()),
                    selected: this.toIso(date) === this.value,
                    disabled: this.isDisabled(date),
                };
            });
        },
        isDisabled(date) {
            const iso = this.toIso(date);

            return (this.min && iso < this.min) || (this.max && iso > this.max);
        },
        previousMonth() {
            this.month = new Date(this.month.getFullYear(), this.month.getMonth() - 1, 1);
        },
        nextMonth() {
            this.month = new Date(this.month.getFullYear(), this.month.getMonth() + 1, 1);
        },
        select(day) {
            if (day.disabled) {
                return;
            }

            this.value = day.iso;
            this.open = false;
            this.$nextTick(() => {
                this.$refs.input.dispatchEvent(new Event('input', { bubbles: true }));
                this.$refs.input.dispatchEvent(new Event('change', { bubbles: true }));
            });
        },
        clear() {
            this.value = '';
            this.open = false;
            this.$nextTick(() => {
                this.$refs.input.dispatchEvent(new Event('input', { bubbles: true }));
                this.$refs.input.dispatchEvent(new Event('change', { bubbles: true }));
            });
        },
    }"
    x-modelable="value"
    x-on:keydown.escape.window="open = false"
>
    @if ($label)
        <label id="{{ $id }}-label" for="{{ $id }}-button" class="mb-2 block text-sm font-medium text-secondary">
            {{ $label }}
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    <input
        x-ref="input"
        id="{{ $id }}"
        type="date"
        @if ($name) name="{{ $name }}" @endif
        @if (! is_null($value)) value="{{ $value }}" @endif
        x-model="value"
        @if ($min) data-min="{{ $min }}" @endif
        @if ($max) data-max="{{ $max }}" @endif
        @required($required)
        @disabled($disabled)
        @if ($errorMessage) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
        {{ $inputAttributes->merge(['class' => 'sr-only']) }}
    >

    <button
        id="{{ $id }}-button"
        type="button"
        class="{{ $attributes->get('class') ? $classes.' '.$attributes->get('class') : $classes }}"
        aria-haspopup="dialog"
        x-bind:aria-expanded="open.toString()"
        @if ($label) aria-labelledby="{{ $id }}-label {{ $id }}-button" @endif
        @if ($errorMessage) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
        @disabled($disabled)
        x-on:click="if (! {{ $disabled ? 'true' : 'false' }}) open = ! open"
    >
        <span class="flex min-w-0 items-center gap-3">
            <i class="bi bi-calendar3 shrink-0 text-secondary/80" aria-hidden="true"></i>
            <span
                class="truncate"
                x-text="displayValue()"
                x-bind:class="value ? 'text-secondary' : 'text-secondary/50'"
            ></span>
        </span>

        <span class="flex shrink-0 items-center gap-2">
            @if ($clearable)
                <span
                    x-show="value"
                    x-cloak
                    role="button"
                    tabindex="-1"
                    class="inline-flex h-6 w-6 items-center justify-center rounded-full text-secondary/70 transition hover:bg-light/30 hover:text-primary"
                    x-on:click.stop="clear()"
                    aria-label="Limpar data"
                >
                    <i class="bi bi-x"></i>
                </span>
            @endif
            <i class="bi bi-chevron-down text-sm text-secondary/70 transition" x-bind:class="open ? 'rotate-180' : ''" aria-hidden="true"></i>
        </span>
    </button>

    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        x-on:click.outside="open = false"
        class="absolute z-50 mt-2 w-full min-w-[20rem] rounded-default border border-border bg-white p-4 text-secondary"
        role="dialog"
        aria-label="Selecionar data"
    >
        <div class="mb-4 flex items-center justify-between gap-3">
            <button type="button" class="inline-flex h-9 w-9 cursor-pointer items-center justify-center rounded-full text-secondary transition hover:bg-light/30 hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/20" x-on:click="previousMonth()" aria-label="Mes anterior">
                <i class="bi bi-chevron-left"></i>
            </button>

            <p class="text-sm font-semibold capitalize text-primary" x-text="monthLabel()"></p>

            <button type="button" class="inline-flex h-9 w-9 cursor-pointer items-center justify-center rounded-full text-secondary transition hover:bg-light/30 hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/20" x-on:click="nextMonth()" aria-label="Proximo mes">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>

        <div class="grid grid-cols-7 gap-1 text-center text-xs font-semibold text-secondary/60">
            <template x-for="dayName in weekDays" x-bind:key="dayName">
                <span class="py-2" x-text="dayName"></span>
            </template>
        </div>

        <div class="mt-1 grid grid-cols-7 gap-1">
            <template x-for="day in days()" x-bind:key="day.iso">
                <button
                    type="button"
                    class="inline-flex h-10 cursor-pointer items-center justify-center rounded-default text-sm font-medium transition focus:outline-none focus:ring-2 focus:ring-primary/20"
                    x-bind:class="{
                        'bg-primary text-white hover:bg-primary': day.selected,
                        'text-primary ring-1 ring-primary/20': day.today && ! day.selected,
                        'text-secondary hover:bg-light/30': day.currentMonth && ! day.selected && ! day.disabled,
                        'text-secondary/35': ! day.currentMonth && ! day.selected,
                        'cursor-not-allowed opacity-35 hover:bg-transparent': day.disabled,
                    }"
                    x-bind:disabled="day.disabled"
                    x-on:click="select(day)"
                    x-text="day.day"
                ></button>
            </template>
        </div>
    </div>
</div>

@if ($errorMessage)
    <p id="{{ $id }}-error" class="mt-2 text-sm text-danger">{{ $errorMessage }}</p>
@endif
