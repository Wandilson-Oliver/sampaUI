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
    $alignClasses = $align === 'right' ? 'right-0' : 'left-0';
    $placementClasses = $placement === 'top' ? 'bottom-full mb-2' : 'top-full mt-2';
@endphp

<div
    id="{{ $id }}"
    {{ $attributes->except('id')->merge(['class' => 'sampaui-dropdown relative inline-flex w-max']) }}
    x-data="SampaUI.dropdown({ closeOnOutside: @js($closeOnOutside), closeOnEscape: @js($closeOnEscape) })"
    x-bind:class="open ? 'z-[90]' : 'z-10'"
    x-on:keydown.escape.window="onEscape()"
    x-on:click.outside="onOutside()"
>
    @isset($trigger)
        <button id="{{ $id }}-trigger" x-ref="trigger" type="button" x-on:click="toggle()" x-bind:aria-expanded="open.toString()" aria-haspopup="menu" aria-controls="{{ $id }}-menu" class="cursor-pointer rounded-default focus:outline-none focus:ring-2 focus:ring-primary/20">{{ $trigger }}</button>
    @else
        <x-sampaui::button id="{{ $id }}-trigger" x-ref="trigger" type="button" variant="outline" icon="{{ $icon }}" icon-position="right" x-on:click="toggle()" x-bind:aria-expanded="open.toString()" aria-haspopup="menu" aria-controls="{{ $id }}-menu">{{ $label }}</x-sampaui::button>
    @endisset

    <div
        x-ref="menu"
        id="{{ $id }}-menu"
        x-cloak
        x-show="open"
        x-transition.opacity.duration.150ms
        x-on:keydown.arrow-down.prevent="move($event, 1)"
        x-on:keydown.arrow-up.prevent="move($event, -1)"
        x-on:keydown.home.prevent="$event.currentTarget.querySelector('a,button,[tabindex]:not([tabindex=\'-1\'])')?.focus()"
        class="absolute {{ $alignClasses }} {{ $placementClasses }} z-[100] rounded-default border border-border bg-white p-1 shadow-default"
        style="width: {{ $width }};"
        role="menu"
        aria-labelledby="{{ $id }}-trigger"
    >{{ $slot }}</div>
</div>
