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
    x-data="{
        format(value) {
            value = value.replace(/\D/g, '').slice(0, 8);

            if (value.length > 5) {
                return value.slice(0, 5) + '-' + value.slice(5);
            }

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
    @endisset

    @isset($suffix)
        <x-slot:suffix>
            {{ $suffix }}
        </x-slot:suffix>
    @endisset
</x-sampaui::input>
