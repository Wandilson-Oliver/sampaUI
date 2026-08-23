@props([
    'label' => null,
    'name' => null,
    'placeholder' => null,
    'symbol' => 'R$',
    'icon' => null,
])

@php
    $effectivePlaceholder = $placeholder ?? '0,00';
@endphp

<x-sampaui::input
    :label="$label"
    :name="$name"
    :placeholder="$effectivePlaceholder"
    :icon="$icon"
    inputmode="decimal"
    x-data="{
        format(value) {
            value = value.replace(/\\D/g, '');
            value = (parseInt(value || 0) / 100).toFixed(2);
            value = value.replace('.', ',');
            value = value.replace(/\\B(?=(\\d{3})+(?!\\d))/g, '.');
            return value;
        }
    }"
    x-on:input="$el.value = format($el.value); if ($el._x_model) { $el._x_model.set($el.value); }"
    {{ $attributes }}
>
    @isset($prefix)
        <x-slot:prefix>
            {{ $prefix }}
        </x-slot:prefix>
    @else
        <x-slot:prefix>
            {{ $symbol }}
        </x-slot:prefix>
    @endisset

    @isset($suffix)
        <x-slot:suffix>
            {{ $suffix }}
        </x-slot:suffix>
    @endisset
</x-sampaui::input>
