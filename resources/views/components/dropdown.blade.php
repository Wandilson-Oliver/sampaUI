@props([
    'label' => 'Acoes',
    'icon' => 'three-dots',
    'align' => 'left',
    'width' => '14rem',
])

@php
    $alignClasses = $align === 'right' ? 'right-0' : 'left-0';
@endphp

<div
    {{ $attributes->merge(['class' => 'sampaui-dropdown relative inline-flex w-max']) }}
    x-data="{ open: false }"
    x-on:keydown.escape.window="open = false"
    x-on:click.outside="open = false"
>
    @isset($trigger)
        <button type="button" x-on:click="open = ! open" x-bind:aria-expanded="open.toString()" class="cursor-pointer">
            {{ $trigger }}
        </button>
    @else
        <x-sampaui::button type="button" variant="outline" icon="{{ $icon }}" icon-position="right" x-on:click="open = ! open" x-bind:aria-expanded="open.toString()">
            {{ $label }}
        </x-sampaui::button>
    @endisset

    <div
        x-cloak
        x-show="open"
        x-transition.opacity.duration.150ms
        class="absolute {{ $alignClasses }} top-full z-40 mt-2 rounded-default border border-light bg-white p-1"
        style="width: {{ $width }};"
        role="menu"
    >
        {{ $slot }}
    </div>
</div>
