@props([
    'label' => null,
    'name' => null,
    'placeholder' => '(99) 9 9999-9999',
    'icon' => 'telephone',
])

<x-sampaui::input
    :label="$label"
    :name="$name"
    :placeholder="$placeholder"
    :icon="$icon"
    inputmode="tel"
    autocomplete="tel"
    x-data="SampaUI.phone()"
    x-on:input="onInput($event)"
    {{ $attributes }}
>
    @isset($prefix)
        <x-slot:prefix>
            {{ $prefix }}
        </x-slot:prefix>
    @endisset

    @isset($suffix)
        <x-slot:suffix>
            {{ $suffix }}
        </x-slot:suffix>
    @endisset
</x-sampaui::input>
