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

    $colors = [
        'primary' => 'peer-checked:border-primary peer-checked:bg-primary peer-focus:ring-primary/20',
        'secondary' => 'peer-checked:border-secondary peer-checked:bg-secondary peer-focus:ring-secondary/20',
        'accent' => 'peer-checked:border-accent peer-checked:bg-accent peer-focus:ring-accent/20',
        'danger' => 'peer-checked:border-danger peer-checked:bg-danger peer-focus:ring-danger/20',
    ];
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
    <span class="{{ sampaui_classes(['inline-flex h-7 w-12 shrink-0 items-center rounded-full border border-light bg-light p-1 transition peer-checked:[&>span]:translate-x-5 peer-focus:outline-none peer-focus:ring-2', $colors[$color] ?? $colors['primary']]) }}">
        <span class="h-5 w-5 rounded-full bg-white transition"></span>
    </span>
    @if ($label || trim($slot->toHtml()) !== '')
        <span class="text-sm font-medium text-secondary">{{ $label ?? $slot }}</span>
    @endif
</label>
