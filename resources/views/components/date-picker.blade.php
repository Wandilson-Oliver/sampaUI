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
    $classes = sampaui_merge_tailwind_classes(
        sampaui_merge_tailwind_classes(sampaui_trigger_classes($errorMessage, $disabled), 'text-slate-600'),
        $attributes->get('class')
    );

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
        menuStyle: {},
        viewportHandler: null,
        init() {
            const initial = this.parseDate(this.value) || new Date();
            this.month = new Date(initial.getFullYear(), initial.getMonth(), 1);
            this.viewportHandler = () => this.positionMenu();
            window.addEventListener('resize', this.viewportHandler);
            window.addEventListener('scroll', this.viewportHandler, true);
            this.$watch('value', (value) => {
                const selected = this.parseDate(value);
                if (selected) this.month = new Date(selected.getFullYear(), selected.getMonth(), 1);
            });
        },
        destroy() {
            window.removeEventListener('resize', this.viewportHandler);
            window.removeEventListener('scroll', this.viewportHandler, true);
        },
        triggerElement() {
            return document.getElementById(@js($id.'-button'));
        },
        menuElement() {
            return document.getElementById(@js($id.'-menu'));
        },
        positionMenu() {
            const triggerElement = this.triggerElement();
            const menu = this.menuElement();
            if (! this.open || ! triggerElement || ! menu) return;

            const trigger = triggerElement.getBoundingClientRect();
            const gap = 8;
            const viewportPadding = 12;
            const below = window.innerHeight - trigger.bottom - viewportPadding;
            const above = trigger.top - viewportPadding;
            const opensUp = below < 400 && above > below;
            const available = Math.max(144, (opensUp ? above : below) - gap);
            const menuHeight = Math.min(menu.scrollHeight || 400, available);
            const menuWidth = Math.min(Math.max(trigger.width, 320), window.innerWidth - (viewportPadding * 2));
            const overlay = triggerElement.closest('[data-sampaui-overlay]');
            const overlayLayer = Number.parseInt(overlay ? window.getComputedStyle(overlay).zIndex : '', 10);

            this.menuStyle = {
                position: 'fixed',
                left: `${Math.max(viewportPadding, Math.min(trigger.left, window.innerWidth - menuWidth - viewportPadding))}px`,
                top: `${opensUp ? Math.max(viewportPadding, trigger.top - menuHeight - gap) : trigger.bottom + gap}px`,
                width: `${menuWidth}px`,
                maxHeight: `${available}px`,
                zIndex: Number.isFinite(overlayLayer) ? overlayLayer + 10 : 120,
            };
        },
        handleMenuOutside(event) {
            if (! this.open) return;
            if (this.$root.contains(event.target) || this.menuElement()?.contains(event.target)) return;
            this.close();
        },
        parseDate(date) {
            if (! date || ! /^\d{4}-\d{2}-\d{2}$/.test(date)) return null;
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
            if (! date) return this.placeholder;
            return new Intl.DateTimeFormat('pt-BR', { day: '2-digit', month: '2-digit', year: 'numeric' }).format(date);
        },
        monthLabel() {
            return new Intl.DateTimeFormat('pt-BR', { month: 'long', year: 'numeric' }).format(this.month);
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
        openMenu() {
            if ({{ $disabled ? 'true' : 'false' }}) return;
            this.open = true;
            this.$nextTick(() => this.positionMenu());
        },
        close() {
            this.open = false;
        },
        toggle() {
            this.open ? this.close() : this.openMenu();
        },
        syncValue() {
            this.$nextTick(() => {
                const input = document.getElementById(@js($id));
                input?.dispatchEvent(new Event('input', { bubbles: true }));
                input?.dispatchEvent(new Event('change', { bubbles: true }));
            });
        },
        select(day) {
            if (day.disabled) return;
            this.value = day.iso;
            this.close();
            this.syncValue();
        },
        clear() {
            if ({{ $disabled ? 'true' : 'false' }}) return;
            this.value = '';
            this.close();
            this.syncValue();
        },
    }"
    x-modelable="value"
    x-on:keydown.escape.window="close()"
    x-on:click.window="handleMenuOutside($event)"
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
        {{ $attributes->except('class')->merge(['class' => $classes]) }}
        aria-haspopup="dialog"
        x-bind:aria-expanded="open.toString()"
        @if ($label) aria-labelledby="{{ $id }}-label {{ $id }}-button" @endif
        @if ($errorMessage) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
        @disabled($disabled)
        x-on:click="toggle()"
    >
        <span class="flex min-w-0 items-center gap-3">
            <i class="bi bi-calendar3 shrink-0 text-current opacity-80" aria-hidden="true"></i>
            <span
                class="truncate"
                x-text="displayValue()"
                x-bind:class="value ? 'text-current' : 'text-slate-400'"
            ></span>
        </span>

        <span class="flex shrink-0 items-center gap-2">
            @if ($clearable)
                <span
                    x-show="value"
                    x-cloak
                    role="button"
                    tabindex="-1"
                    class="inline-flex h-6 w-6 items-center justify-center rounded-full text-current opacity-70 transition hover:bg-light/30 hover:opacity-100"
                    x-on:click.stop="clear()"
                    aria-label="Limpar data"
                >
                    <i class="bi bi-x"></i>
                </span>
            @endif
            <i class="bi bi-chevron-down text-sm text-current opacity-70 transition" x-bind:class="open ? 'rotate-180' : ''" aria-hidden="true"></i>
        </span>
    </button>

    <template x-teleport="body">
    <div
        id="{{ $id }}-menu"
        x-show="open"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        x-bind:style="menuStyle"
        style="display: none;"
        class="overflow-y-auto rounded-default border border-border bg-white p-4 text-slate-600 shadow-2xl shadow-secondary/10"
        role="dialog"
        aria-label="Selecionar data"
    >
        <div class="mb-4 flex items-center justify-between gap-3">
            <button type="button" class="inline-flex h-9 w-9 cursor-pointer items-center justify-center rounded-full text-slate-600 transition hover:bg-light/30 focus:outline-none focus:ring-2 focus:ring-primary/20" x-on:click="previousMonth()" aria-label="Mes anterior">
                <i class="bi bi-chevron-left"></i>
            </button>

            <p class="text-sm font-semibold capitalize text-slate-600" x-text="monthLabel()"></p>

            <button type="button" class="inline-flex h-9 w-9 cursor-pointer items-center justify-center rounded-full text-slate-600 transition hover:bg-light/30 focus:outline-none focus:ring-2 focus:ring-primary/20" x-on:click="nextMonth()" aria-label="Proximo mes">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>

        <div class="grid grid-cols-7 gap-1 text-center text-xs font-semibold text-slate-600/70">
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
                        'text-slate-600 ring-1 ring-slate-300': day.today && ! day.selected,
                        'text-slate-600 hover:bg-light/30': day.currentMonth && ! day.selected && ! day.disabled,
                        'text-slate-400': ! day.currentMonth && ! day.selected,
                        'cursor-not-allowed opacity-35 hover:bg-transparent': day.disabled,
                    }"
                    x-bind:disabled="day.disabled"
                    x-on:click="select(day)"
                    x-text="day.day"
                ></button>
            </template>
        </div>
    </div>
    </template>
</div>

@if ($errorMessage)
    <p id="{{ $id }}-error" class="mt-2 text-sm text-danger">{{ $errorMessage }}</p>
@endif
