@props([
    'label' => null,
    'name' => null,
    'checked' => false,
    'disabled' => false,
    'value' => '1',
    'color' => 'primary',
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-toggle');
@endphp

<label class="{{ sampaui_classes(['inline-flex cursor-pointer items-center gap-3', 'cursor-not-allowed opacity-50' => $disabled]) }}" for="{{ $id }}">
    <input
        id="{{ $id }}"
        type="checkbox"
        name="{{ $name }}"
        value="{{ $value }}"
        class="peer sr-only"
        @checked($checked)
        @disabled($disabled)
        {{ $attributes->except('class') }}
    >
    <span class="{{ sampaui_classes(['inline-flex h-7 w-12 shrink-0 items-center rounded-full border bg-light p-1 transition peer-checked:[&>span]:translate-x-5 peer-focus:outline-none peer-focus:ring-2', sampaui_toggle_color_classes($color)]) }}">
        <span class="h-5 w-5 rounded-full transition"></span>
    </span>
    @if ($label || trim($slot->toHtml()) !== '')
        <span class="text-sm font-medium text-secondary">{{ $label ?? $slot }}</span>
    @endif
</label>
