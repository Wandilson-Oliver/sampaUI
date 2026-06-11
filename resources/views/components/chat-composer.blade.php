@props([
    'name' => 'message',
    'placeholder' => 'Digite uma mensagem',
    'buttonLabel' => 'Enviar',
    'rows' => 1,
])

@php
    $modelAttributes = $attributes->filter(
        fn (mixed $attributeValue, string $attributeName): bool => str_starts_with($attributeName, 'wire:model') || $attributeName === 'x-model'
    );
@endphp

<form {{ $attributes->whereDoesntStartWith('wire:model')->except('x-model')->merge(['class' => 'flex items-end gap-2']) }}>
    @isset($before)
        <div class="shrink-0">{{ $before }}</div>
    @endisset

    <textarea
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        class="max-h-32 min-h-11 flex-1 resize-none rounded-default border border-secondary/40 bg-white px-4 py-2.5 text-sm leading-6 text-secondary transition placeholder:text-secondary/50 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20"
        {{ $modelAttributes }}
    >{{ $slot }}</textarea>

    @isset($after)
        <div class="shrink-0">{{ $after }}</div>
    @else
        <x-sampaui::button type="submit" icon="send-fill" rounded>
            <span class="sr-only">{{ $buttonLabel }}</span>
        </x-sampaui::button>
    @endisset
</form>
