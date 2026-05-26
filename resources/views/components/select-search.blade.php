@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'options' => [],
    'placeholder' => 'Selecione',
    'searchPlaceholder' => 'Buscar...',
    'emptyText' => 'Nenhum resultado encontrado.',
    'error' => null,
    'disabled' => false,
    'required' => false,
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-select-search');
    $errorMessage = sampaui_error($name, $error, $errors ?? null);

    $normalizedOptions = collect($options)
        ->map(function ($optionLabel, $optionValue): array {
            if (is_array($optionLabel)) {
                return [
                    'value' => (string) ($optionLabel['value'] ?? $optionValue),
                    'label' => (string) ($optionLabel['label'] ?? $optionLabel['value'] ?? $optionValue),
                ];
            }

            return [
                'value' => (string) $optionValue,
                'label' => (string) $optionLabel,
            ];
        })
        ->values()
        ->all();

    $selectedValue = old($name, $value);
    $selectedOption = collect($normalizedOptions)->first(
        fn (array $option): bool => ! is_null($selectedValue) && (string) $option['value'] === (string) $selectedValue
    );

    $triggerClasses = sampaui_trigger_classes($errorMessage, $disabled, [
        $attributes->get('class'),
    ]);
@endphp

<div
    x-data="{
        open: false,
        search: '',
        value: @js((string) ($selectedValue ?? '')),
        selectedLabel: @js($selectedOption['label'] ?? ''),
        options: @js($normalizedOptions),
        placeholder: @js($placeholder),
        select(option) {
            this.value = option.value;
            this.selectedLabel = option.label;
            this.open = false;
            this.search = '';

            this.$nextTick(() => {
                this.$refs.input.dispatchEvent(new Event('input', { bubbles: true }));
                this.$refs.input.dispatchEvent(new Event('change', { bubbles: true }));
                this.$dispatch('select-search:changed', {
                    id: @js($id),
                    name: @js($name),
                    value: option.value,
                    label: option.label,
                });
            });
        },
        filteredOptions() {
            const term = this.search.trim().toLowerCase();

            if (! term) {
                return this.options;
            }

            return this.options.filter(option => option.label.toLowerCase().includes(term));
        },
    }"
    x-on:keydown.escape.window="open = false"
>
    @if ($label)
        <label for="{{ $id }}-button" class="mb-2 block text-sm font-medium text-secondary">
            {{ $label }}
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    <input
        x-ref="input"
        type="hidden"
        id="{{ $id }}"
        @if ($name) name="{{ $name }}" @endif
        x-bind:value="value"
        @if ($required) required @endif
        @disabled($disabled)
        @if ($errorMessage) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
        {{ $attributes->except(['id', 'class'])->merge(['value' => $selectedValue]) }}
    >

    <div class="relative">
        <button
            type="button"
            id="{{ $id }}-button"
            class="{{ $triggerClasses }}"
            x-on:click="if (! @js($disabled)) { open = ! open; $nextTick(() => $refs.search?.focus()) }"
            x-on:keydown.enter.prevent="if (! @js($disabled)) { open = ! open; $nextTick(() => $refs.search?.focus()) }"
            x-on:keydown.space.prevent="if (! @js($disabled)) { open = ! open; $nextTick(() => $refs.search?.focus()) }"
            x-bind:aria-expanded="open.toString()"
            aria-haspopup="listbox"
            aria-controls="{{ $id }}-listbox"
            @if ($errorMessage) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
            @disabled($disabled)
        >
            <span
                class="min-w-0 flex-1 truncate"
                x-bind:class="selectedLabel ? 'text-secondary' : 'text-secondary/50'"
                x-text="selectedLabel || placeholder"
            >
                {{ $selectedOption['label'] ?? $placeholder }}
            </span>

            <i
                class="bi bi-chevron-down shrink-0 text-sm text-secondary transition"
                x-bind:class="open ? 'rotate-180' : ''"
                aria-hidden="true"
            ></i>
        </button>

        <div
            x-show="open"
            x-transition.origin.top.duration.150ms
            x-cloak
            x-on:click.outside="open = false"
            class="absolute left-0 top-full z-[120] mt-2 w-full overflow-hidden rounded-default border border-light bg-white"
        >
            <div class="border-b border-light p-2">
                <div class="relative">
                    <i class="bi bi-search pointer-events-none absolute inset-y-0 left-3 flex items-center text-sm text-secondary/60"></i>
                    <input
                        x-ref="search"
                        x-model="search"
                        type="search"
                        placeholder="{{ $searchPlaceholder }}"
                        class="block w-full rounded-default border border-light bg-white py-2 pl-9 pr-3 text-sm text-secondary outline-none transition placeholder:text-secondary/50 focus:border-primary focus:ring-2 focus:ring-primary/20"
                    >
                </div>
            </div>

            <ul id="{{ $id }}-listbox" role="listbox" class="max-h-64 overflow-y-auto py-1">
                <template x-for="option in filteredOptions()" x-bind:key="option.value">
                    <li>
                        <button
                            type="button"
                            role="option"
                            class="flex w-full cursor-pointer items-center justify-between gap-3 px-4 py-2.5 text-left text-sm text-secondary transition hover:bg-light/30 focus:bg-light/30 focus:outline-none"
                            x-bind:aria-selected="value === option.value"
                            x-on:click="select(option)"
                        >
                            <span class="truncate" x-text="option.label"></span>
                            <i x-show="value === option.value" class="bi bi-check2 text-primary" aria-hidden="true"></i>
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
