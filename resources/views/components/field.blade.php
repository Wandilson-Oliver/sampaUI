@props([
    'id',
    'labelFor' => null,
    'label' => null,
    'hint' => null,
    'error' => null,
    'required' => false,
])

<div {{ $attributes->merge(['class' => 'w-full space-y-2']) }}>
    @if ($label)
        <label for="{{ $labelFor ?? $id }}" class="block text-sm font-medium text-secondary">
            {{ $label }}
            @if ($required)
                <span class="text-danger" aria-hidden="true">*</span>
                <span class="sr-only">(obrigatorio)</span>
            @endif
        </label>
    @endif

    {{ $slot }}

    @if ($hint)
        <p id="{{ $id }}-hint" class="text-sm leading-5 text-secondary/70">{{ $hint }}</p>
    @endif

    @if ($error)
        <p id="{{ $id }}-error" class="text-sm leading-5 text-danger" role="alert">{{ $error }}</p>
    @endif
</div>
