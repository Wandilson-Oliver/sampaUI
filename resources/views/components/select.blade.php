@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'options' => [],
    'placeholder' => null,
    'emptyText' => 'Nenhuma opcao encontrada.',
    'hint' => null,
    'error' => null,
    'state' => null,
    'disabled' => false,
    'readonly' => false,
    'loading' => false,
    'loadingTarget' => null,
    'required' => false,
    'clearable' => false,
    'clearLabel' => 'Limpar selecao',
])

@php
    $fieldName = sampaui_field_name($attributes, $name);
    $id = sampaui_id($attributes, $fieldName, 'sampaui-select');
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
    $selectedValue = $fieldName ? old($fieldName, $value) : $value;
    $selectedOption = collect($normalizedOptions)->first(fn (array $option): bool => ! is_null($selectedValue) && (string) $option['value'] === (string) $selectedValue);
    $unavailable = $disabled || $loading;
    $triggerClasses = sampaui_trigger_classes($errorMessage, $disabled, [
        $attributes->get('class'),
        'pr-20' => $clearable,
        'pr-3' => ! $clearable && ($loading || isset($suffix)),
        'bg-light/40 text-secondary/80' => $readonly,
    ], $state, $loading);
    $modelAttributes = $attributes->filter(
        fn (mixed $attributeValue, string $attributeName): bool => str_starts_with($attributeName, 'wire:model') || $attributeName === 'x-model'
    );
    $controlAttributes = $attributes
        ->whereDoesntStartWith('wire:model')
        ->whereDoesntStartWith('x-model')
        ->except(['id', 'class', 'aria-describedby']);
@endphp

<x-sampaui::field :id="$id" :label-for="$id.'-button'" :label="$label" :hint="$hint" :error="$errorMessage" :required="$required">
    <div
        {{ $modelAttributes }}
        x-data="SampaUI.select(@js([
            'id' => $id,
            'name' => $fieldName,
            'value' => (string) ($selectedValue ?? ''),
            'selectedLabel' => $selectedOption['label'] ?? '',
            'options' => $normalizedOptions,
            'placeholder' => $placeholder,
            'disabled' => $unavailable,
            'readonly' => $readonly,
        ]))"
        x-modelable="value"
        x-on:keydown.escape.stop="close()"
        x-on:click.window="handleMenuOutside($event)"
        class="relative"
    >
        <select
            x-ref="native"
            x-model="value"
            id="{{ $id }}"
            @if ($name) name="{{ $name }}" @endif
            @disabled($unavailable)
            @required($required)
            @if ($readonly) aria-readonly="true" @endif
            @if ($loadingTarget) wire:loading.attr="disabled" wire:target="{{ $loadingTarget }}" @endif
            @if ($errorMessage) aria-invalid="true" @else aria-invalid="false" @endif
            @if ($describedBy) aria-describedby="{{ $describedBy }}" @endif
            @if ($loading) aria-busy="true" @endif
            {{ $controlAttributes->merge(['class' => 'sr-only']) }}
        >
            @if ($placeholder)<option value="">{{ $placeholder }}</option>@endif
            @foreach ($normalizedOptions as $option)
                <option value="{{ $option['value'] }}" @selected((string) ($selectedValue ?? '') === $option['value']) @disabled($option['disabled'])>{{ $option['label'] }}</option>
            @endforeach
            {{ $slot }}
        </select>

        <button
            type="button"
            id="{{ $id }}-button"
            class="{{ $triggerClasses }}"
            x-ref="trigger"
            x-on:click="toggle()"
            x-on:keydown.arrow-down.prevent="move(1)"
            x-on:keydown.arrow-up.prevent="move(-1)"
            x-on:keydown.home.prevent="moveTo('start')"
            x-on:keydown.end.prevent="moveTo('end')"
            x-on:keydown.enter.prevent="chooseActive()"
            x-on:keydown.space.prevent="chooseActive()"
            x-bind:aria-expanded="open.toString()"
            x-bind:aria-activedescendant="open && activeIndex >= 0 ? @js($id.'-option-') + activeIndex : null"
            aria-haspopup="listbox"
            aria-controls="{{ $id }}-listbox"
            @if ($errorMessage) aria-invalid="true" @else aria-invalid="false" @endif
            @if ($describedBy) aria-describedby="{{ $describedBy }}" @endif
            @disabled($unavailable)
        >
            @isset($prefix)<span class="shrink-0 text-secondary/60">{{ $prefix }}</span>@endisset

            <span class="min-w-0 flex-1 truncate" x-bind:class="selectedLabel ? 'text-secondary' : 'text-secondary/50'" x-text="selectedLabel || placeholder || ''">{{ $selectedOption['label'] ?? $placeholder }}</span>

            <span class="flex shrink-0 items-center gap-1">
                @if ($loading)<i class="bi bi-arrow-repeat animate-spin text-sm text-primary" aria-hidden="true"></i>@endif
                @isset($suffix){{ $suffix }}@else<i class="bi bi-chevron-down text-sm text-secondary transition" x-bind:class="open ? 'rotate-180' : ''" aria-hidden="true"></i>@endisset
            </span>
        </button>

        @if ($clearable)
            <button
                type="button"
                x-show="value"
                x-cloak
                x-on:click="clear()"
                class="absolute right-10 top-1.5 z-10 inline-flex h-8 w-8 items-center justify-center rounded-full text-secondary/60 hover:bg-light focus:outline-none focus:ring-2 focus:ring-primary/20"
                aria-label="{{ $clearLabel }}"
                @disabled($unavailable || $readonly)
            ><i class="bi bi-x-lg text-xs" aria-hidden="true"></i></button>
        @endif

        <template x-teleport="body">
        <div
            x-ref="menu"
            x-show="open"
            x-cloak
            x-transition.opacity.duration.150ms
            x-bind:style="menuStyle"
            class="overflow-hidden rounded-default border border-border bg-white shadow-2xl shadow-secondary/10"
        >
            <ul id="{{ $id }}-listbox" role="listbox" class="max-h-64 overflow-y-auto py-1">
                <template x-for="(option, index) in options" x-bind:key="option.value">
                    <li>
                        <button
                            type="button"
                            role="option"
                            x-bind:id="@js($id.'-option-') + index"
                            x-ref="option"
                            class="flex w-full cursor-pointer items-center justify-between gap-3 px-4 py-2.5 text-left text-sm text-secondary transition hover:bg-light/30 focus:bg-light/30 focus:outline-none disabled:cursor-not-allowed disabled:opacity-50"
                            x-bind:class="activeIndex === index ? 'bg-light/50 text-primary' : ''"
                            x-bind:aria-selected="value === option.value"
                            x-bind:disabled="option.disabled"
                            x-on:mouseenter="activeIndex = index"
                            x-on:click="select(option)"
                        ><span class="truncate" x-text="option.label"></span><i x-show="value === option.value" class="bi bi-check2 text-primary" aria-hidden="true"></i></button>
                    </li>
                </template>
                <li x-show="options.length === 0" class="px-4 py-3 text-sm text-secondary/70" role="status">{{ $emptyText }}</li>
            </ul>
        </div>
        </template>
    </div>
</x-sampaui::field>
