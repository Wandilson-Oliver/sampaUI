@props([
    'text' => null,
    'position' => 'top',
])

@php
    $id = $attributes->get('id') ?? 'sampaui-tooltip-'.uniqid();
@endphp

<span
    id="{{ $id }}"
    {{ $attributes->except('id')->merge(['class' => 'inline-flex w-max']) }}
    x-data="SampaUI.tooltip(@js([
        'triggerId' => $id.'-trigger',
        'menuId' => $id.'-content',
        'placement' => $position,
        'isTooltip' => true,
    ]))"
    x-on:mouseenter="show()"
    x-on:mouseleave="hide()"
    x-on:focusin="show()"
    x-on:focusout="hide()"
    x-on:keydown.escape.window="hide()"
>
    <span id="{{ $id }}-trigger" class="inline-flex">
        {{ $slot }}
    </span>

    <template x-teleport="body">
        <div
            id="{{ $id }}-content"
            x-show="showTooltip"
            x-transition.opacity.duration.150ms
            x-bind:style="menuStyle"
            style="display: none;"
            class="pointer-events-none fixed z-50 whitespace-nowrap rounded-default bg-secondary px-2.5 py-1.5 text-xs font-medium text-white shadow-md"
            role="tooltip"
        >
            {{ $text }}
        </div>
    </template>
</span>
