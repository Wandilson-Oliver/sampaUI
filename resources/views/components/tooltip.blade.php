@props([
    'text' => null,
    'position' => 'top',
])

@php
    $id = $attributes->get('id') ?? 'sampaui-tooltip-'.uniqid();
    $customClasses = (string) $attributes->get('class', '');
    $classes = sampaui_merge_tailwind_classes('inline-flex w-max', $customClasses);
@endphp

<span
    id="{{ $id }}"
    {{ $attributes->except(['id', 'class'])->merge(['class' => $classes]) }}
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
            class="pointer-events-none fixed z-50 whitespace-nowrap rounded-default bg-secondary dark:bg-slate-800 dark:border dark:border-slate-700 px-2.5 py-1.5 text-xs font-medium text-white shadow-md"
            role="tooltip"
        >
            {{ $text }}
        </div>
    </template>
</span>
