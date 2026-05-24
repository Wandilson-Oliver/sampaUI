@props([
    'label' => null,
    'name' => null,
    'rows' => 4,
    'placeholder' => null,
    'editor' => false,
    'editorMinHeight' => '180px',
    'error' => null,
    'disabled' => false,
])

@php
    $editorValue = is_bool($editor) ? $editor : strtolower((string) $editor);
    $editorEnabled = $editor === true || in_array($editorValue, ['true', '1', 'easymde', 'markdown'], true);
    $id = $attributes->get('id') ?? $name ?? 'sampaui-textarea-'.uniqid();
    $errorBag = $errors ?? null;
    $errorMessage = $error ?: ($name && $errorBag?->has($name) ? $errorBag->first($name) : null);
    $classes = collect([
        'block w-full rounded-default border bg-white px-4 py-2.5 text-base text-secondary shadow-sm transition placeholder:text-secondary/50 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20',
        $errorMessage ? 'border-danger' : 'border-light',
        $disabled ? 'opacity-50 pointer-events-none' : null,
    ])->filter()->implode(' ');
@endphp

@if ($label)
    <label for="{{ $id }}" class="mb-2 block text-sm font-medium text-secondary">{{ $label }}</label>
@endif

<textarea
    id="{{ $id }}"
    rows="{{ $rows }}"
    @if ($name) name="{{ $name }}" @endif
    @if ($placeholder) placeholder="{{ $placeholder }}" @endif
    @if ($editorEnabled) data-sampaui-editor="easymde" data-sampaui-editor-min-height="{{ $editorMinHeight }}" @endif
    @disabled($disabled)
    @if ($errorMessage) aria-invalid="true" aria-describedby="{{ $id }}-error" @endif
    {{ $attributes->except('id')->merge(['class' => $classes]) }}
>{{ $slot }}</textarea>

@if ($errorMessage)
    <p id="{{ $id }}-error" class="mt-2 text-sm text-danger">{{ $errorMessage }}</p>
@endif
