@props([
    'label' => null,
    'name' => null,
    'value' => '1',
    'checked' => false,
    'color' => 'primary',
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
    $id = sampaui_id($attributes, $name, 'sampaui-checkbox');
    $errorMessage = sampaui_error($name, $error, $errors ?? null);
    $describedBy = sampaui_described_by($id, $hint, $errorMessage, $attributes->get('aria-describedby'));
    $unavailable = $disabled || $readonly || $loading;
    $classes = sampaui_classes([
        'h-5 w-5 cursor-pointer rounded border border-secondary/40 transition focus:outline-none focus:ring-2 focus:ring-offset-2',
        sampaui_control_color_classes($color),
        'border-danger ring-2 ring-danger/20' => filled($errorMessage) || $state === 'error',
        'border-success' => ! $errorMessage && $state === 'success',
        'border-warning' => ! $errorMessage && $state === 'warning',
        'cursor-not-allowed opacity-50' => $unavailable,
    ]);
@endphp

<x-sampaui::field :id="$id" :hint="$hint" :error="$errorMessage">
    <div class="flex items-start gap-3">
        <input
            id="{{ $id }}"
            type="checkbox"
            value="{{ $value }}"
            @if ($name) name="{{ $name }}" @endif
            @checked($checked)
            @disabled($unavailable)
            @required($required)
            @if ($readonly) aria-readonly="true" @endif
            @if ($loadingTarget) wire:loading.attr="disabled" wire:target="{{ $loadingTarget }}" @endif
            @if ($errorMessage) aria-invalid="true" @else aria-invalid="false" @endif
            @if ($describedBy) aria-describedby="{{ $describedBy }}" @endif
            @if ($loading) aria-busy="true" @endif
            {{ $attributes->except(['id', 'aria-describedby'])->merge(['class' => $classes]) }}
        >

        @if ($label || trim($slot->toHtml()) !== '')
            <label for="{{ $id }}" @class(['text-sm font-medium text-secondary', 'cursor-pointer' => ! $unavailable, 'cursor-not-allowed opacity-50' => $unavailable])>
                {{ $label ?: $slot }}
                @if ($required)<span class="text-danger" aria-hidden="true">*</span><span class="sr-only">(obrigatorio)</span>@endif
            </label>
        @endif
    </div>
</x-sampaui::field>
