@props([
    'label' => 'Acoes',
    'icon' => 'three-dots',
    'align' => 'left',
    'placement' => 'bottom',
    'width' => '14rem',
    'closeOnOutside' => true,
    'closeOnEscape' => true,
])

@php
    $id = $attributes->get('id') ?? 'sampaui-dropdown-'.uniqid();
@endphp

<div
    id="{{ $id }}"
    {{ $attributes->except('id')->merge(['class' => 'sampaui-dropdown relative inline-flex w-max']) }}
    x-data="SampaUI.dropdown(@js([
        'triggerId' => $id.'-trigger',
        'menuId' => $id.'-menu',
        'align' => $align,
        'placement' => $placement,
        'matchTriggerWidth' => false,
        'closeOnOutside' => $closeOnOutside,
        'closeOnEscape' => $closeOnEscape,
    ]))"
    x-on:keydown.escape.window="onEscape()"
    x-on:click.window="handleMenuOutside($event)"
>
    @isset($trigger)
        <button id="{{ $id }}-trigger" type="button" x-on:click="toggle()" x-bind:aria-expanded="open.toString()" aria-haspopup="menu" aria-controls="{{ $id }}-menu" class="cursor-pointer rounded-default focus:outline-none focus:ring-2 focus:ring-primary/20">{{ $trigger }}</button>
    @else
        <x-sampaui::button id="{{ $id }}-trigger" type="button" variant="outline" icon="{{ $icon }}" icon-position="right" x-on:click="toggle()" x-bind:aria-expanded="open.toString()" aria-haspopup="menu" aria-controls="{{ $id }}-menu">{{ $label }}</x-sampaui::button>
    @endisset

    <template x-teleport="body">
        <div
            id="{{ $id }}-menu"
            x-show="open"
            x-transition.opacity.duration.150ms
            x-bind:style="menuStyle"
            x-on:keydown.arrow-down.prevent="move($event, 1)"
            x-on:keydown.arrow-up.prevent="move($event, -1)"
            x-on:keydown.home.prevent="$event.currentTarget.querySelector('a,button,[tabindex]:not([tabindex=\'-1\'])')?.focus()"
            class="overflow-y-auto rounded-default border border-border bg-white p-1 shadow-default"
            style="display: none; width: {{ $width }};"
            role="menu"
            aria-labelledby="{{ $id }}-trigger"
        >{{ $slot }}</div>
    </template>
</div>
