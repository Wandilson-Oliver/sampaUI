@props([
    'label' => null,
    'name' => null,
    'placeholder' => '00000-000',
    'icon' => 'geo-alt',
])

<x-sampaui::input
    :label="$label"
    :name="$name"
    :placeholder="$placeholder"
    :icon="$icon"
    inputmode="numeric"
    autocomplete="postal-code"
    x-data
    x-mask="99999-999"
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
