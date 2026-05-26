@props([
    'type' => 'text',
    'label' => null,
    'name' => null,
    'value' => null,
    'placeholder' => null,
    'error' => null,
    'disabled' => false,
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-input');
    $errorMessage = sampaui_error($name, $error, $errors ?? null);
    $classes = sampaui_field_classes($errorMessage, $disabled);
@endphp

@if ($label)
    <label for="{{ $id }}" class="mb-2 block text-sm font-medium text-secondary">{{ $label }}</label>
@endif

<input
    id="{{ $id }}"
    type="{{ $type }}"
    @if ($name) name="{{ $name }}" @endif
    @if (! is_null($value)) value="{{ $value }}" @endif
    @if ($placeholder) placeholder="{{ $placeholder }}" @endif
    @disabled($disabled)
    @if ($errorMessage) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
    {{ $attributes->except('id')->merge(['class' => $classes]) }}
>

@if ($errorMessage)
    <p id="{{ $id }}-error" class="mt-2 text-sm text-danger">{{ $errorMessage }}</p>
@endif
