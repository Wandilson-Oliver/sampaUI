@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'options' => [],
    'color' => 'primary',
    'inline' => false,
    'error' => null,
    'disabled' => false,
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-radio');
    $errorMessage = sampaui_error($name, $error, $errors ?? null);
    $normalizedOptions = collect($options)
        ->map(function ($optionLabel, $optionValue): array {
            if (is_array($optionLabel)) {
                return [
                    'value' => (string) ($optionLabel['value'] ?? $optionValue),
                    'label' => (string) ($optionLabel['label'] ?? $optionLabel['value'] ?? $optionValue),
                    'disabled' => (bool) ($optionLabel['disabled'] ?? false),
                ];
            }

            return [
                'value' => (string) $optionValue,
                'label' => (string) $optionLabel,
                'disabled' => false,
            ];
        })
        ->values();

    $inputClasses = sampaui_classes([
        'h-5 w-5 cursor-pointer border-light transition focus:ring-2 focus:ring-offset-2',
        sampaui_control_color_classes($color),
        $errorMessage ? 'ring-2 ring-danger/20' : null,
    ]);
@endphp

<fieldset
    {{ $attributes->only('class')->merge(['class' => 'space-y-3']) }}
    @if ($errorMessage) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
>
    @if ($label)
        <legend class="text-sm font-medium text-secondary">{{ $label }}</legend>
    @endif

    @if ($normalizedOptions->isNotEmpty())
        <div @class(['flex gap-4' => $inline, 'space-y-3' => ! $inline])>
            @foreach ($normalizedOptions as $index => $option)
                @php
                    $optionId = $id.'-'.$index;
                    $optionDisabled = $disabled || $option['disabled'];
                @endphp

                <label
                    for="{{ $optionId }}"
                    @class([
                        'flex items-center gap-3 text-sm font-medium text-secondary',
                        'cursor-pointer' => ! $optionDisabled,
                        'cursor-not-allowed opacity-50' => $optionDisabled,
                    ])
                >
                    <input
                        id="{{ $optionId }}"
                        type="radio"
                        value="{{ $option['value'] }}"
                        @if ($name) name="{{ $name }}" @endif
                        @checked(! is_null($value) && (string) $value === (string) $option['value'])
                        @disabled($optionDisabled)
                        {{ $attributes->except(['id', 'class'])->merge(['class' => $inputClasses]) }}
                    >
                    <span>{{ $option['label'] }}</span>
                </label>
            @endforeach
        </div>
    @else
        <div @class(['flex gap-4' => $inline, 'space-y-3' => ! $inline])>
            {{ $slot }}
        </div>
    @endif
</fieldset>

@if ($errorMessage)
    <p id="{{ $id }}-error" class="mt-2 text-sm text-danger">{{ $errorMessage }}</p>
@endif
