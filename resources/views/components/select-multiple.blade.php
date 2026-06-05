@props([
    'label' => null,
    'name' => null,
    'value' => [],
    'options' => [],
    'placeholder' => 'Selecione',
    'searchPlaceholder' => 'Buscar...',
    'emptyText' => 'Nenhum resultado encontrado.',
    'loadingText' => 'Carregando opcoes...',
    'error' => null,
    'disabled' => false,
    'loading' => false,
    'required' => false,
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-select-multiple');
    $errorMessage = sampaui_error($name, $error, $errors ?? null);

    $normalizedOptions = collect($options)
        ->map(function ($optionLabel, $optionValue): array {
            if (is_array($optionLabel)) {
                return [
                    'value' => (string) ($optionLabel['value'] ?? $optionValue),
                    'label' => (string) ($optionLabel['label'] ?? $optionLabel['value'] ?? $optionValue),
                    'disabled' => (bool) ($optionLabel['disabled'] ?? false),
                ];
            }

            return [
                'value' => (string) $optionValue,
                'label' => (string) $optionLabel,
                'disabled' => false,
            ];
        })
        ->values()
        ->all();

    $selectedValues = old($name, $value);

    if (is_string($selectedValues)) {
        $selectedValues = filled($selectedValues) ? [$selectedValues] : [];
    }

    $selectedValues = collect($selectedValues ?? [])
        ->flatten()
        ->map(fn (mixed $selectedValue): string => (string) $selectedValue)
        ->values()
        ->all();

    $inputName = $name && ! str_ends_with($name, '[]') ? $name.'[]' : $name;
    $isUnavailable = $disabled || $loading;
    $triggerClasses = sampaui_trigger_classes($errorMessage, $isUnavailable, [
        'min-h-12 flex-wrap items-center gap-2 py-2',
        $attributes->get('class'),
    ]);
    $modelAttributes = $attributes->filter(
        fn (mixed $attributeValue, string $attributeName): bool => str_starts_with($attributeName, 'wire:model') || $attributeName === 'x-model'
    );
    $inputAttributes = $attributes
        ->whereDoesntStartWith('wire:model')
        ->whereDoesntStartWith('x-model')
        ->except(['id', 'class']);
@endphp

<div
    {{ $modelAttributes }}
    x-data="{
        open: false,
        search: '',
        values: @js($selectedValues),
        options: @js($normalizedOptions),
        disabled: @js($disabled),
        loading: @js($loading),
        placeholder: @js($placeholder),
        init() {
            this.values = this.normalizeValues(this.values);
        },
        normalizeValues(value) {
            if (Array.isArray(value)) {
                return [...new Set(value.map(item => String(item)))];
            }

            if (value === null || value === undefined || value === '') {
                return [];
            }

            return [String(value)];
        },
        canInteract() {
            return ! this.disabled && ! this.loading;
        },
        toggle() {
            if (! this.canInteract()) return;

            this.open = ! this.open;
            if (this.open) this.$nextTick(() => this.$refs.search?.focus());
        },
        close() {
            this.open = false;
            this.search = '';
        },
        isSelected(option) {
            return this.values.includes(String(option.value));
        },
        selectedOptions() {
            return this.values
                .map(value => this.options.find(option => String(option.value) === String(value)))
                .filter(Boolean);
        },
        filteredOptions() {
            const term = this.search.trim().toLowerCase();
            const options = this.options.filter(option => ! this.isSelected(option));

            if (! term) {
                return options;
            }

            return options.filter(option => option.label.toLowerCase().includes(term));
        },
        select(option) {
            if (! this.canInteract() || option.disabled || this.isSelected(option)) return;

            this.values = this.normalizeValues([...this.values, option.value]);
            this.search = '';
            this.dispatchChange(option, 'selected');
            this.$nextTick(() => this.$refs.search?.focus());
        },
        remove(value) {
            if (! this.canInteract()) return;

            const removed = this.options.find(option => String(option.value) === String(value));
            this.values = this.normalizeValues(this.values.filter(item => String(item) !== String(value)));
            this.dispatchChange(removed || { value, label: value }, 'removed');
        },
        dispatchChange(option, action) {
            this.$nextTick(() => {
                this.$dispatch('select-multiple:changed', {
                    id: @js($id),
                    name: @js($name),
                    values: this.values,
                    option,
                    action,
                });
            });
        },
    }"
    x-modelable="values"
    x-on:keydown.escape.window="close()"
>
    @if ($label)
        <label for="{{ $id }}-button" class="mb-2 block text-sm font-medium text-secondary">
            {{ $label }}
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    @if ($inputName)
        <template x-for="selectedValue in values" x-bind:key="selectedValue">
            <input
                type="hidden"
                name="{{ $inputName }}"
                x-bind:value="selectedValue"
                @if ($required) required @endif
                @disabled($disabled)
                {{ $inputAttributes }}
            >
        </template>
    @endif

    <div class="relative">
        <div
            id="{{ $id }}-button"
            role="combobox"
            tabindex="{{ $isUnavailable ? '-1' : '0' }}"
            class="{{ $triggerClasses }}"
            x-on:click="toggle()"
            x-on:keydown.enter.prevent="toggle()"
            x-on:keydown.space.prevent="toggle()"
            x-bind:aria-expanded="open.toString()"
            x-bind:aria-disabled="(! canInteract()).toString()"
            aria-haspopup="listbox"
            aria-controls="{{ $id }}-listbox"
            @if ($errorMessage) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
        >
            <span class="flex min-w-0 flex-1 flex-wrap items-center gap-2">
                <template x-for="option in selectedOptions()" x-bind:key="option.value">
                    <span class="inline-flex max-w-full items-center gap-1.5 rounded-full border border-primary/20 bg-primary/10 px-2.5 py-1 text-sm font-medium text-primary">
                        <span class="truncate" x-text="option.label"></span>
                        <button
                            type="button"
                            class="inline-flex h-4 w-4 cursor-pointer items-center justify-center rounded-full text-primary transition hover:bg-primary/15 focus:bg-primary/15 focus:outline-none"
                            x-on:click.stop="remove(option.value)"
                            x-on:keydown.enter.stop.prevent="remove(option.value)"
                            x-on:keydown.space.stop.prevent="remove(option.value)"
                            x-bind:disabled="! canInteract()"
                            aria-label="Remover opcao"
                        >
                            <i class="bi bi-x text-sm leading-none" aria-hidden="true"></i>
                        </button>
                    </span>
                </template>

                <span
                    x-show="values.length === 0"
                    x-cloak
                    class="truncate text-secondary/50"
                    x-text="placeholder"
                >{{ $placeholder }}</span>
            </span>

            <span class="flex shrink-0 items-center gap-2">
                @if ($loading)
                    <i class="bi bi-arrow-repeat animate-spin text-sm text-primary" aria-hidden="true"></i>
                @endif

                <i
                    class="bi bi-chevron-down text-sm text-secondary transition"
                    x-bind:class="open ? 'rotate-180' : ''"
                    aria-hidden="true"
                ></i>
            </span>
        </div>

        <div
            x-show="open"
            x-transition.origin.top.duration.150ms
            x-cloak
            x-on:click.outside="close()"
            class="absolute left-0 top-full z-[120] mt-2 w-full min-w-0 max-w-[calc(100vw-2rem)] overflow-hidden rounded-default border border-light bg-white shadow-xl shadow-secondary/10 sm:max-w-none"
        >
            <div class="border-b border-light p-2">
                <div class="relative">
                    <i class="bi bi-search pointer-events-none absolute inset-y-0 left-3 flex items-center text-sm text-secondary/60"></i>
                    <input
                        x-ref="search"
                        x-model="search"
                        type="search"
                        placeholder="{{ $searchPlaceholder }}"
                        class="block w-full rounded-default border border-secondary/50 bg-white py-2 pl-9 pr-3 text-sm text-secondary outline-none transition placeholder:text-secondary/50 focus:border-primary focus:ring-2 focus:ring-primary/20"
                        @disabled($isUnavailable)
                    >
                </div>
            </div>

            <div x-show="loading" class="flex items-center gap-2 px-4 py-3 text-sm text-secondary/70">
                <i class="bi bi-arrow-repeat animate-spin text-primary" aria-hidden="true"></i>
                <span>{{ $loadingText }}</span>
            </div>

            <ul
                x-show="! loading"
                id="{{ $id }}-listbox"
                role="listbox"
                aria-multiselectable="true"
                class="max-h-72 overflow-y-auto py-1"
            >
                <template x-for="option in filteredOptions()" x-bind:key="option.value">
                    <li>
                        <button
                            type="button"
                            role="option"
                            class="flex w-full cursor-pointer items-center justify-between gap-3 px-4 py-2.5 text-left text-sm text-secondary transition hover:bg-light/30 focus:bg-light/30 focus:outline-none disabled:cursor-not-allowed disabled:opacity-50"
                            x-bind:aria-selected="isSelected(option)"
                            x-bind:disabled="option.disabled"
                            x-on:click="select(option)"
                        >
                            <span class="truncate" x-text="option.label"></span>
                            <i class="bi bi-plus-lg text-primary" aria-hidden="true"></i>
                        </button>
                    </li>
                </template>

                <li x-show="filteredOptions().length === 0" class="px-4 py-3 text-sm text-secondary/70">
                    {{ $emptyText }}
                </li>
            </ul>
        </div>
    </div>

    @if ($errorMessage)
        <p id="{{ $id }}-error" class="mt-2 text-sm text-danger">{{ $errorMessage }}</p>
    @endif
</div>
