@props([
    'id',
    'labelFor' => null,
    'label' => null,
    'hint' => null,
    'error' => null,
    'required' => false,
])
@php
    $customClasses = (string) $attributes->get('class', '');
    $classes = sampaui_merge_tailwind_classes('w-full space-y-2', $customClasses);
@endphp

<div {{ $attributes->except('class')->merge(['class' => $classes]) }}>
    @if ($label)
        <label for="{{ $labelFor ?? $id }}" class="block text-sm font-medium text-secondary dark:text-slate-200">
            {{ $label }}
            @if ($required)
                <span class="text-danger" aria-hidden="true">*</span>
                <span class="sr-only">(obrigatorio)</span>
            @endif
        </label>
    @endif

    {{ $slot }}

    @if ($hint)
        <p id="{{ $id }}-hint" class="text-sm leading-5 text-secondary/70 dark:text-slate-400">{{ $hint }}</p>
    @endif

    @if ($error)
        <p id="{{ $id }}-error" class="text-sm leading-5 text-danger" role="alert">{{ $error }}</p>
    @endif
</div>
