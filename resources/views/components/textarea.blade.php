@props([
    'label' => null,
    'name' => null,
    'rows' => 4,
    'placeholder' => null,
    'hint' => null,
    'error' => null,
    'state' => null,
    'disabled' => false,
    'readonly' => false,
    'loading' => false,
    'loadingTarget' => null,
    'required' => false,
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-textarea');
    $errorMessage = sampaui_error($name, $error, $errors ?? null);
    $describedBy = sampaui_described_by($id, $hint, $errorMessage, $attributes->get('aria-describedby'));
    $classes = sampaui_field_classes($errorMessage, $disabled, [], $state, $readonly, $loading);
@endphp

<x-sampaui::field :id="$id" :label="$label" :hint="$hint" :error="$errorMessage" :required="$required">
    <textarea
        id="{{ $id }}"
        rows="{{ $rows }}"
        @if ($name) name="{{ $name }}" @endif
        @if ($placeholder) placeholder="{{ $placeholder }}" @endif
        @disabled($disabled || $loading)
        @readonly($readonly)
        @required($required)
        @if ($loadingTarget) wire:loading.attr="disabled" wire:target="{{ $loadingTarget }}" @endif
        @if ($errorMessage) aria-invalid="true" @else aria-invalid="false" @endif
        @if ($describedBy) aria-describedby="{{ $describedBy }}" @endif
        @if ($loading) aria-busy="true" @endif
        {{ $attributes->except(['id', 'aria-describedby'])->merge(['class' => $classes]) }}
    >{{ $slot }}</textarea>
</x-sampaui::field>
