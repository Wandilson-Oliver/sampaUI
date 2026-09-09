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
    x-data="SampaUI.currencyBr()"
    x-on:input="onInput($event)"
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
