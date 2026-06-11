@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'options' => [],
    'placeholder' => null,
    'emptyText' => 'Nenhuma opcao encontrada.',
    'error' => null,
    'disabled' => false,
    'required' => false,
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-select');
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
    $selectedValue = old($name, $value);
    $selectedOption = collect($normalizedOptions)->first(
        fn (array $option): bool => ! is_null($selectedValue) && (string) $option['value'] === (string) $selectedValue
    );
    $triggerClasses = sampaui_trigger_classes($errorMessage, $disabled, [
        $attributes->get('class'),
    ]);
    $modelAttributes = $attributes->filter(
        fn (mixed $attributeValue, string $attributeName): bool => str_starts_with($attributeName, 'wire:model') || $attributeName === 'x-model'
    );
    $selectAttributes = $attributes
        ->whereDoesntStartWith('wire:model')
        ->whereDoesntStartWith('x-model')
        ->except(['id', 'class']);
@endphp

<div
    {{ $modelAttributes }}
    x-data="{
        open: false,
        value: @js((string) ($selectedValue ?? '')),
        selectedLabel: @js($selectedOption['label'] ?? ''),
        options: @js($normalizedOptions),
        placeholder: @js($placeholder),
        init() {
            if (! this.value && this.$refs.native?.value) {
                this.value = String(this.$refs.native.value);
            }

            if (this.options.length === 0 && this.$refs.native) {
                this.options = Array.from(this.$refs.native.options)
                    .filter(option => option.value !== '')
                    .map(option => ({
                        value: String(option.value),
                        label: option.textContent.trim(),
                        disabled: option.disabled,
                    }));
            }

            this.syncSelectedLabel();
            this.$watch('value', () => this.syncSelectedLabel());
        },
        syncSelectedLabel() {
            this.selectedLabel = this.options.find(option => option.value === String(this.value))?.label || '';
        },
        select(option) {
            if (option.disabled) {
                return;
            }

            this.value = option.value;
            this.open = false;

            this.$nextTick(() => {
                this.$refs.native.value = this.value;
                this.$refs.native.dispatchEvent(new Event('input', { bubbles: true }));
                this.$refs.native.dispatchEvent(new Event('change', { bubbles: true }));
                this.$dispatch('select:changed', {
                    id: @js($id),
                    name: @js($name),
                    value: option.value,
                    label: option.label,
                });
            });
        },
    }"
    x-modelable="value"
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

    <select
        x-ref="native"
        id="{{ $id }}"
        @if ($name) name="{{ $name }}" @endif
        x-bind:value="value"
        @disabled($disabled)
        @if ($required) required @endif
        @if ($errorMessage) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
        {{ $selectAttributes->merge(['class' => 'sr-only']) }}
    >
        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif

        {{ $slot }}
    </select>

    <div class="relative">
        <button
            type="button"
            id="{{ $id }}-button"
            class="{{ $triggerClasses }}"
            x-on:click="if (! @js($disabled)) { open = ! open }"
            x-on:keydown.enter.prevent="if (! @js($disabled)) { open = ! open }"
            x-on:keydown.space.prevent="if (! @js($disabled)) { open = ! open }"
            x-bind:aria-expanded="open.toString()"
            aria-haspopup="listbox"
            aria-controls="{{ $id }}-listbox"
            @if ($errorMessage) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
            @disabled($disabled)
        >
            <span
                class="min-w-0 flex-1 truncate"
                x-bind:class="selectedLabel ? 'text-secondary' : 'text-secondary/50'"
                x-text="selectedLabel || placeholder || ''"
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
            class="absolute left-0 top-full z-[120] mt-2 w-full overflow-hidden rounded-default border border-light bg-white shadow-2xl shadow-secondary/10"
        >
            <ul id="{{ $id }}-listbox" role="listbox" class="max-h-64 overflow-y-auto py-1">
                <template x-for="option in options" x-bind:key="option.value">
                    <li>
                        <button
                            type="button"
                            role="option"
                            class="flex w-full cursor-pointer items-center justify-between gap-3 px-4 py-2.5 text-left text-sm text-secondary transition hover:bg-light/30 focus:bg-light/30 focus:outline-none disabled:cursor-not-allowed disabled:opacity-50"
                            x-bind:aria-selected="value === option.value"
                            x-bind:disabled="option.disabled"
                            x-on:click="select(option)"
                        >
                            <span class="truncate" x-text="option.label"></span>
                            <i x-show="value === option.value" class="bi bi-check2 text-primary" aria-hidden="true"></i>
                        </button>
                    </li>
                </template>

                <li x-show="options.length === 0" class="px-4 py-3 text-sm text-secondary/70">
                    {{ $emptyText }}
                </li>
            </ul>
        </div>
    </div>

    @if ($errorMessage)
        <p id="{{ $id }}-error" class="mt-2 text-sm text-danger">{{ $errorMessage }}</p>
    @endif
</div>
