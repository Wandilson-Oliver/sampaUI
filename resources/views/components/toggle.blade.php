@props([
    'label' => null,
    'name' => null,
    'checked' => false,
    'disabled' => false,
    'readonly' => false,
    'loading' => false,
    'loadingTarget' => null,
    'required' => false,
    'hint' => null,
    'error' => null,
    'state' => null,
    'value' => '1',
    'color' => 'primary',
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-toggle');
    $errorMessage = sampaui_error($name, $error, $errors ?? null);
    $describedBy = sampaui_described_by($id, $hint, $errorMessage, $attributes->get('aria-describedby'));
    $unavailable = $disabled || $readonly || $loading;
@endphp

<x-sampaui::field :id="$id" :hint="$hint" :error="$errorMessage">
    <label class="{{ sampaui_classes(['inline-flex cursor-pointer items-center gap-3', 'cursor-not-allowed opacity-50' => $unavailable]) }}" for="{{ $id }}">
        <span class="relative inline-flex h-7 w-12 shrink-0">
            <input
                id="{{ $id }}"
                type="checkbox"
                @if ($name) name="{{ $name }}" @endif
                value="{{ $value }}"
                role="switch"
                @checked($checked)
                @disabled($unavailable)
                @required($required)
                @if ($readonly) aria-readonly="true" @endif
                @if ($loadingTarget) wire:loading.attr="disabled" wire:target="{{ $loadingTarget }}" @endif
                @if ($errorMessage) aria-invalid="true" @else aria-invalid="false" @endif
                @if ($describedBy) aria-describedby="{{ $describedBy }}" @endif
                @if ($loading) aria-busy="true" @endif
                {{ $attributes->except(['id', 'aria-describedby'])->merge(['class' => 'peer sr-only']) }}
            >
            <span class="{{ sampaui_classes(['absolute inset-0 rounded-full border bg-light transition peer-focus:outline-none peer-focus:ring-2', sampaui_toggle_color_classes($color), 'ring-2 ring-danger/20' => filled($errorMessage) || $state === 'error']) }}" aria-hidden="true"></span>
            <span class="{{ sampaui_classes(['absolute left-1 top-1 h-5 w-5 rounded-full shadow-sm transition peer-checked:translate-x-5', sampaui_toggle_knob_color_classes($color)]) }}" aria-hidden="true"></span>
        </span>
        @if ($label || trim($slot->toHtml()) !== '')
            <span class="text-sm font-medium text-secondary">{{ $label ?? $slot }} @if ($required)<span class="text-danger" aria-hidden="true">*</span>@endif</span>
        @endif
    </label>
</x-sampaui::field>
