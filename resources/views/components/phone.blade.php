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
    x-data="{
        format(value) {
            value = value.replace(/\D/g, '').slice(0, 11);

            if (value.length <= 2) {
                return value;
            }

            if (value.length <= 6) {
                return '(' + value.slice(0, 2) + ') ' + value.slice(2);
            }

            if (value.length <= 10) {
                return '(' + value.slice(0, 2) + ') ' + value.slice(2, 6) + '-' + value.slice(6);
            }

            return '(' + value.slice(0, 2) + ') ' + value.slice(2, 3) + ' ' + value.slice(3, 7) + '-' + value.slice(7);
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
