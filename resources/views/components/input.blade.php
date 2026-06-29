@props([
    'type' => 'text',
    'label' => null,
    'name' => null,
    'value' => null,
    'placeholder' => null,
    'hint' => null,
    'error' => null,
    'state' => null,
    'disabled' => false,
    'readonly' => false,
    'loading' => false,
    'loadingTarget' => null,
    'required' => false,
    'icon' => null,
    'revealable' => true,
    'clearable' => false,
    'clearLabel' => 'Limpar campo',
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-input');
    $errorMessage = sampaui_error($name, $error, $errors ?? null);
    $describedBy = sampaui_described_by($id, $hint, $errorMessage, $attributes->get('aria-describedby'));
    $isPassword = $type === 'password';
    $hasCustomSuffix = isset($suffix);
    $hasPasswordToggle = $isPassword && $revealable && ! $hasCustomSuffix;
    $hasPrefix = filled($icon) || isset($prefix);
    $hasSuffix = $hasCustomSuffix || $hasPasswordToggle || $clearable || $loading;
    $classes = sampaui_field_classes($errorMessage, $disabled, [
        'h-12 py-0',
        'pl-11' => $hasPrefix,
        'pr-11' => $hasSuffix,
    ], $state, $readonly, $loading);
@endphp

<x-sampaui::field :id="$id" :label="$label" :hint="$hint" :error="$errorMessage" :required="$required">
    <div
        @class(['relative' => $hasPrefix || $hasSuffix])
        @if ($hasSuffix) x-data="SampaUI.input({ clearable: @js($clearable) })" @endif
    >
        @if ($hasPrefix)
            <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-secondary/60" aria-hidden="true">
                @isset($prefix)
                    {{ $prefix }}
                @else
                    <i class="bi bi-{{ $icon }}"></i>
                @endisset
            </span>
        @endif

        <input
            x-ref="control"
            id="{{ $id }}"
            type="{{ $type }}"
            @if ($hasPasswordToggle) x-bind:type="showPassword ? 'text' : 'password'" @endif
            @if ($name) name="{{ $name }}" @endif
            @if (! is_null($value)) value="{{ $value }}" @endif
            @if ($placeholder) placeholder="{{ $placeholder }}" @endif
            @disabled($disabled || $loading)
            @readonly($readonly)
            @required($required)
            @if ($loadingTarget) wire:loading.attr="disabled" wire:target="{{ $loadingTarget }}" @endif
            @if ($errorMessage) aria-invalid="true" @else aria-invalid="false" @endif
            @if ($describedBy) aria-describedby="{{ $describedBy }}" @endif
            @if ($loading) aria-busy="true" @endif
            {{ $attributes->except(['id', 'aria-describedby'])->merge(['class' => $classes]) }}
        >

        @if ($hasSuffix)
            <span class="absolute inset-y-0 right-3 flex items-center gap-1 text-secondary/60">
                @isset($suffix)
                    {{ $suffix }}
                @else
                    @if ($loading)
                        <i class="bi bi-arrow-repeat animate-spin" aria-hidden="true"></i>
                    @endif

                    @if ($clearable)
                        <button
                            type="button"
                            x-show="hasValue"
                            x-cloak
                            class="inline-flex h-8 w-8 items-center justify-center rounded-full transition hover:bg-light focus:outline-none focus:ring-2 focus:ring-primary/20"
                            x-on:click="clear()"
                            aria-label="{{ $clearLabel }}"
                            @disabled($disabled || $readonly || $loading)
                        ><i class="bi bi-x-lg text-sm" aria-hidden="true"></i></button>
                    @endif

                    @if ($hasPasswordToggle)
                        <button
                            type="button"
                            class="inline-flex h-8 w-8 items-center justify-center rounded-full transition hover:bg-light hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/20"
                            x-on:click="showPassword = ! showPassword"
                            x-bind:aria-label="showPassword ? 'Ocultar senha' : 'Mostrar senha'"
                            x-bind:aria-pressed="showPassword.toString()"
                            @disabled($disabled || $readonly || $loading)
                        ><i class="bi" x-bind:class="showPassword ? 'bi-eye-slash' : 'bi-eye'" aria-hidden="true"></i></button>
                    @endif
                @endisset
            </span>
        @endif
    </div>
</x-sampaui::field>
