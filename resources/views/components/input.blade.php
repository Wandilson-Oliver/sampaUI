@props([
    'type' => 'text',
    'label' => null,
    'name' => null,
    'value' => null,
    'placeholder' => null,
    'error' => null,
    'disabled' => false,
    'icon' => null,
    'revealable' => true,
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-input');
    $errorMessage = sampaui_error($name, $error, $errors ?? null);
    $isPassword = $type === 'password';
    $hasCustomSuffix = isset($suffix);
    $hasPasswordToggle = $isPassword && $revealable && ! $hasCustomSuffix;
    $hasPrefix = filled($icon) || isset($prefix);
    $hasSuffix = $hasCustomSuffix || $hasPasswordToggle;
    $classes = sampaui_field_classes($errorMessage, $disabled, [
        'pl-11' => $hasPrefix,
        'pr-11' => $hasSuffix,
    ]);
@endphp

<div>
    @if ($label)
        <label for="{{ $id }}" class="mb-2 block text-sm font-medium text-secondary">{{ $label }}</label>
    @endif

    <div @class(['relative' => $hasPrefix || $hasSuffix]) @if ($isPassword) x-data="{ showPassword: false }" @endif>
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
            id="{{ $id }}"
            type="{{ $type }}"
            @if ($isPassword && $revealable) x-bind:type="showPassword ? 'text' : 'password'" @endif
            @if ($name) name="{{ $name }}" @endif
            @if (! is_null($value)) value="{{ $value }}" @endif
            @if ($placeholder) placeholder="{{ $placeholder }}" @endif
            @disabled($disabled)
            @if ($errorMessage) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
            {{ $attributes->except('id')->merge(['class' => $classes]) }}
        >

        @if ($hasSuffix)
            <span class="absolute inset-y-0 right-4 flex items-center text-secondary/60">
                @isset($suffix)
                    {{ $suffix }}
                @else
                    <button
                        type="button"
                        class="inline-flex h-8 w-8 cursor-pointer items-center justify-center rounded-full text-secondary/70 transition hover:bg-light hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/20"
                        x-on:click="showPassword = ! showPassword"
                        x-bind:aria-label="showPassword ? 'Ocultar senha' : 'Mostrar senha'"
                        x-bind:aria-pressed="showPassword.toString()"
                    >
                        <i class="bi" x-bind:class="showPassword ? 'bi-eye-slash' : 'bi-eye'" aria-hidden="true"></i>
                    </button>
                @endisset
            </span>
        @endif
    </div>

    @if ($errorMessage)
        <p id="{{ $id }}-error" class="mt-2 text-sm text-danger">{{ $errorMessage }}</p>
    @endif
</div>
