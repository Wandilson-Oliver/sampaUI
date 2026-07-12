@props([
    'label' => null,
    'name' => null,
    'value' => [],
    'options' => [],
    'placeholder' => 'Selecione',
    'searchPlaceholder' => 'Buscar...',
    'emptyText' => 'Nenhum resultado encontrado.',
    'loadingText' => 'Carregando opcoes...',
    'hint' => null,
    'error' => null,
    'state' => null,
    'disabled' => false,
    'readonly' => false,
    'loading' => false,
    'loadingTarget' => null,
    'required' => false,
    'clearable' => true,
    'clearLabel' => 'Limpar selecao',
])

@php
    $fieldName = sampaui_field_name($attributes, $name);
    $id = sampaui_id($attributes, $fieldName, 'sampaui-select-multiple');
    $errorMessage = sampaui_error($fieldName, $error, $errors ?? null);
    $describedBy = sampaui_described_by($id, $hint, $errorMessage, $attributes->get('aria-describedby'));
    $normalizedOptions = collect($options)->map(function ($optionLabel, $optionValue): array {
        if (is_array($optionLabel)) {
            return [
                'value' => (string) ($optionLabel['value'] ?? $optionValue),
                'label' => (string) ($optionLabel['label'] ?? $optionLabel['value'] ?? $optionValue),
                'disabled' => (bool) ($optionLabel['disabled'] ?? false),
            ];
        }
        return ['value' => (string) $optionValue, 'label' => (string) $optionLabel, 'disabled' => false];
    })->values()->all();
    $selectedValues = $fieldName ? old($fieldName, $value) : $value;
    if (is_string($selectedValues)) $selectedValues = filled($selectedValues) ? [$selectedValues] : [];
    $selectedValues = collect($selectedValues ?? [])->flatten()->map(fn (mixed $item): string => (string) $item)->unique()->values()->all();
    $unavailable = $disabled || $loading;
    $triggerClasses = sampaui_trigger_classes($errorMessage, $disabled, ['min-h-12 flex-wrap items-center gap-2 py-2', $attributes->get('class')], $state, $loading);
    $controlAttributes = $attributes->except(['id', 'class', 'aria-describedby']);
@endphp

<x-sampaui::field :id="$id" :label-for="$id.'-button'" :label="$label" :hint="$hint" :error="$errorMessage" :required="$required">
    <div
        x-data="SampaUI.selectMultiple(@js([
            'id' => $id,
            'triggerId' => $id.'-button',
            'menuId' => $id.'-menu',
            'searchId' => $id.'-search',
            'name' => $fieldName,
            'values' => $selectedValues,
            'options' => $normalizedOptions,
            'disabled' => $unavailable,
            'readonly' => $readonly,
            'loading' => $loading,
        ]))"
        x-on:keydown.escape.stop="close()"
        x-on:click.window="handleMenuOutside($event)"
        class="relative"
    >
        <select
            x-ref="native"
            x-model="values"
            id="{{ $id }}"
            @if ($name) name="{{ str_ends_with($name, '[]') ? $name : $name.'[]' }}" @endif
            multiple
            class="sr-only"
            @disabled($unavailable)
            @required($required)
            @if ($readonly) aria-readonly="true" @endif
            @if ($loadingTarget) wire:loading.attr="disabled" wire:target="{{ $loadingTarget }}" @endif
            @if ($errorMessage) aria-invalid="true" @else aria-invalid="false" @endif
            @if ($describedBy) aria-describedby="{{ $describedBy }}" @endif
            @if ($loading) aria-busy="true" @endif
            {{ $controlAttributes }}
        >
            @foreach ($normalizedOptions as $option)
                <option value="{{ $option['value'] }}" @selected(in_array($option['value'], $selectedValues, true)) @disabled($option['disabled'])>{{ $option['label'] }}</option>
            @endforeach
        </select>

        <div
            id="{{ $id }}-button"
            role="combobox"
            tabindex="{{ $unavailable || $readonly ? '-1' : '0' }}"
            class="{{ $triggerClasses }}"
            x-on:click="toggle()"
            x-on:keydown.enter.prevent="toggle()"
            x-on:keydown.space.prevent="toggle()"
            x-on:keydown.arrow-down.prevent="if (!open) toggle(); move(1)"
            x-on:keydown.arrow-up.prevent="if (!open) toggle(); move(-1)"
            x-bind:aria-expanded="open.toString()"
            x-bind:aria-disabled="(!canInteract()).toString()"
            x-bind:aria-activedescendant="open && activeIndex >= 0 ? @js($id.'-option-') + activeIndex : null"
            aria-haspopup="listbox"
            aria-controls="{{ $id }}-listbox"
            @if ($errorMessage) aria-invalid="true" @else aria-invalid="false" @endif
            @if ($describedBy) aria-describedby="{{ $describedBy }}" @endif
        >
            @isset($prefix)<span class="shrink-0 text-secondary/60">{{ $prefix }}</span>@endisset
            <span class="flex min-w-0 flex-1 flex-wrap items-center gap-2">
                <template x-for="option in selectedOptions()" x-bind:key="option.value">
                    <span class="inline-flex max-w-full items-center gap-1.5 rounded-full border border-primary/20 bg-primary/10 px-2.5 py-1 text-sm font-medium text-primary">
                        <span class="truncate" x-text="option.label"></span>
                        <button type="button" class="inline-flex h-4 w-4 items-center justify-center rounded-full hover:bg-primary/15 focus:outline-none focus:ring-2 focus:ring-primary/20" x-on:click.stop="remove(option.value)" x-bind:disabled="!canInteract()" x-bind:aria-label="'Remover ' + option.label"><i class="bi bi-x text-sm" aria-hidden="true"></i></button>
                    </span>
                </template>
                <span x-show="values.length === 0" x-cloak class="truncate text-secondary/50">{{ $placeholder }}</span>
            </span>

            <span class="flex shrink-0 items-center gap-1">
                @if ($clearable)
                    <button type="button" x-show="values.length" x-cloak x-on:click.stop="clear()" class="inline-flex h-7 w-7 items-center justify-center rounded-full hover:bg-light focus:outline-none focus:ring-2 focus:ring-primary/20" aria-label="{{ $clearLabel }}"><i class="bi bi-x-lg text-xs" aria-hidden="true"></i></button>
                @endif
                @if ($loading)<i class="bi bi-arrow-repeat animate-spin text-sm text-primary" aria-hidden="true"></i>@endif
                @isset($suffix){{ $suffix }}@else<i class="bi bi-chevron-down text-sm transition" x-bind:class="open ? 'rotate-180' : ''" aria-hidden="true"></i>@endisset
            </span>
        </div>

        <template x-teleport="body">
        <div id="{{ $id }}-menu" x-show="open" x-transition.opacity.duration.150ms x-bind:style="menuStyle" style="display: none;" class="min-w-0 overflow-hidden rounded-default border border-border bg-white shadow-2xl shadow-secondary/10">
            <div class="border-b border-border p-2">
                <div class="relative">
                    <i class="bi bi-search pointer-events-none absolute inset-y-0 left-3 flex items-center text-sm text-secondary/60" aria-hidden="true"></i>
                    <input
                        id="{{ $id }}-search"
                        x-model="search"
                        type="search"
                        placeholder="{{ $searchPlaceholder }}"
                        class="block w-full rounded-default border border-secondary/20 bg-white py-2 pl-9 pr-3 text-sm text-secondary outline-none transition placeholder:text-secondary/50 hover:border-secondary/30 focus:border-primary focus:ring-2 focus:ring-primary/20"
                        x-on:keydown.arrow-down.prevent="move(1)"
                        x-on:keydown.arrow-up.prevent="move(-1)"
                        x-on:keydown.enter.prevent="chooseActive()"
                        @disabled($unavailable || $readonly)
                        aria-controls="{{ $id }}-listbox"
                    >
                </div>
            </div>

            <div x-show="loading" class="flex items-center gap-2 px-4 py-3 text-sm text-secondary/70" role="status"><i class="bi bi-arrow-repeat animate-spin text-primary" aria-hidden="true"></i><span>{{ $loadingText }}</span></div>

            <ul x-show="!loading" id="{{ $id }}-listbox" role="listbox" aria-multiselectable="true" class="max-h-72 overflow-y-auto py-1">
                <template x-for="(option, index) in filteredOptions()" x-bind:key="option.value">
                    <li>
                        <button
                            type="button"
                            role="option"
                            x-bind:id="@js($id.'-option-') + index"
                            class="flex w-full cursor-pointer items-center justify-between gap-3 px-4 py-2.5 text-left text-sm text-secondary transition hover:bg-light/30 focus:bg-light/30 focus:outline-none disabled:cursor-not-allowed disabled:opacity-50"
                            x-bind:class="activeIndex === index ? 'bg-light/50 text-primary' : ''"
                            aria-selected="false"
                            x-bind:disabled="option.disabled"
                            x-on:mouseenter="activeIndex = index"
                            x-on:click="select(option)"
                        ><span class="truncate" x-text="option.label"></span><i class="bi bi-plus-lg text-primary" aria-hidden="true"></i></button>
                    </li>
                </template>
                <li x-show="filteredOptions().length === 0" class="px-4 py-3 text-sm text-secondary/70" role="status">{{ $emptyText }}</li>
            </ul>
        </div>
        </template>
    </div>
</x-sampaui::field>
