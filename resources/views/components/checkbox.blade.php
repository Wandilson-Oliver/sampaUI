@props([
    'label' => null,
    'name' => null,
    'value' => '1',
    'checked' => false,
    'color' => 'primary',
    'error' => null,
    'disabled' => false,
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-checkbox');
    $errorMessage = sampaui_error($name, $error, $errors ?? null);
    $classes = sampaui_classes([
        'h-5 w-5 cursor-pointer rounded border border-light transition focus:ring-2 focus:ring-offset-2',
        sampaui_control_color_classes($color),
        $errorMessage ? 'border-danger ring-2 ring-danger/20' : null,
        $disabled ? 'cursor-not-allowed opacity-50' : null,
    ]);
@endphp

<div class="flex items-start gap-3">
    <input
        id="{{ $id }}"
        type="checkbox"
        value="{{ $value }}"
        @if ($name) name="{{ $name }}" @endif
        @checked($checked)
        @disabled($disabled)
        @if ($errorMessage) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
        {{ $attributes->except('id')->merge(['class' => $classes]) }}
    >

    @if ($label || trim($slot->toHtml()) !== '')
        <label for="{{ $id }}" @class(['text-sm font-medium text-secondary', 'cursor-pointer' => ! $disabled, 'cursor-not-allowed opacity-50' => $disabled])>
            {{ $label ?: $slot }}
        </label>
    @endif
</div>

@if ($errorMessage)
    <p id="{{ $id }}-error" class="mt-2 text-sm text-danger">{{ $errorMessage }}</p>
@endif
