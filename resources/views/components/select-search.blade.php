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
    $fieldName = sampaui_field_name($attributes, $name);
    $id = sampaui_id($attributes, $fieldName, 'sampaui-select-search');
    $errorMessage = sampaui_error($fieldName, $error, $errors ?? null);

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

    $selectedValue = $fieldName ? old($fieldName, $value) : $value;
    $selectedOption = collect($normalizedOptions)->first(
        fn (array $option): bool => ! is_null($selectedValue) && (string) $option['value'] === (string) $selectedValue
    );

    $triggerClasses = sampaui_trigger_classes($errorMessage, $disabled, [
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
    x-data="SampaUI.selectSearch(@js([
        'id' => $id,
        'triggerId' => $id.'-button',
        'menuId' => $id.'-menu',
        'searchId' => $id.'-search',
        'name' => $fieldName,
        'value' => (string) ($selectedValue ?? ''),
        'selectedLabel' => $selectedOption['label'] ?? '',
        'options' => $normalizedOptions,
        'placeholder' => $placeholder,
        'disabled' => $disabled,
    ]))"
    x-modelable="value"
    x-on:keydown.escape.window="close()"
    x-on:click.window="handleMenuOutside($event)"
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
        x-ref="input"
        id="{{ $id }}"
        @if ($name) name="{{ $name }}" @endif
        x-model="value"
        @if ($required) required @endif
        @disabled($disabled)
        @if ($errorMessage) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
        {{ $inputAttributes->merge(['class' => 'sr-only']) }}
    >
        <option value="">{{ $placeholder }}</option>
        @foreach ($normalizedOptions as $option)
            <option value="{{ $option['value'] }}" @selected((string) ($selectedValue ?? '') === $option['value'])>{{ $option['label'] }}</option>
        @endforeach
    </select>

    <div class="relative">
        <button
            type="button"
            id="{{ $id }}-button"
            class="{{ $triggerClasses }}"
            x-on:click="toggle()"
            x-on:keydown.enter.prevent="toggle()"
            x-on:keydown.space.prevent="toggle()"
            x-on:keydown.arrow-down.prevent="if (!open) openMenu(); move(1)"
            x-on:keydown.arrow-up.prevent="if (!open) openMenu(); move(-1)"
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

        <template x-teleport="body">
        <div
            id="{{ $id }}-menu"
            x-show="open"
            x-transition.opacity.duration.150ms
            x-bind:style="menuStyle"
            style="display: none;"
            class="overflow-hidden rounded-default border border-border bg-white shadow-2xl shadow-secondary/10"
        >
            <div class="border-b border-border p-2">
                <div class="relative">
                    <i class="bi bi-search pointer-events-none absolute inset-y-0 left-3 flex items-center text-sm text-secondary/60"></i>
                    <input
                        id="{{ $id }}-search"
                        x-model="search"
                        type="search"
                        placeholder="{{ $searchPlaceholder }}"
                        class="block w-full rounded-default border border-secondary/20 bg-white py-2 pl-9 pr-3 text-sm text-secondary outline-none transition placeholder:text-secondary/50 hover:border-secondary/30 focus:border-primary focus:ring-2 focus:ring-primary/20"
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

                <li x-show="filteredOptions().length === 0" class="px-4 py-3 text-sm text-secondary/70" role="status">
                    {{ $emptyText }}
                </li>
            </ul>
        </div>
        </template>
    </div>

    @if ($errorMessage)
        <p id="{{ $id }}-error" class="mt-2 text-sm text-danger">{{ $errorMessage }}</p>
    @endif
</div>
