@props([
    'name' => 'message',
    'placeholder' => 'Digite uma mensagem...',
    'buttonLabel' => 'Enviar mensagem',
    'buttonIcon' => 'send-fill',
    'rows' => 1,
    'disabled' => false,
    'loading' => false,
    'loadingTarget' => null,
    'maxLength' => null,
    'showCounter' => false,
    'autoResize' => true,
    'submitOnEnter' => true,
])

@php
    $modelAttributes = $attributes->filter(
        fn (mixed $attributeValue, string $attributeName): bool => str_starts_with($attributeName, 'wire:model') || $attributeName === 'x-model'
    );
@endphp

<form
    x-data="SampaUI.chatComposer({
        autoResize: @js($autoResize),
        submitOnEnter: @js($submitOnEnter),
    })"
    {{ $attributes->whereDoesntStartWith('wire:model')->except('x-model')->merge(['class' => 'flex items-end gap-2 rounded-2xl border border-border/80 bg-surface p-2 shadow-xs transition-all duration-150 focus-within:border-primary/60 focus-within:ring-2 focus-within:ring-primary/20']) }}
>
    @isset($before)
        <div class="flex shrink-0 items-center pb-0.5 gap-1 text-secondary/60">{{ $before }}</div>
    @endisset

    <div class="min-w-0 flex-1">
        <textarea
            x-ref="control"
            name="{{ $name }}"
            rows="{{ $rows }}"
            placeholder="{{ $placeholder }}"
            @if ($maxLength) maxlength="{{ $maxLength }}" @endif
            @disabled($disabled || $loading)
            @if ($loadingTarget) wire:loading.attr="disabled" wire:target="{{ $loadingTarget }}" @endif
            x-on:input="resize()"
            x-on:keydown="handleKeydown($event)"
            aria-label="{{ $placeholder }}"
            class="block max-h-40 min-h-10 w-full resize-none border-0 bg-transparent px-2.5 py-2 text-sm leading-relaxed text-secondary outline-none placeholder:text-secondary/45 focus:ring-0"
            {{ $modelAttributes }}
        >{{ $slot }}</textarea>

        @if ($showCounter && $maxLength)
            <p class="px-2.5 pb-1 text-right text-[0.6875rem] font-medium text-secondary/45" aria-live="polite">
                <span x-text="valueLength">0</span>/{{ $maxLength }}
            </p>
        @endif
    </div>

    @isset($after)
        <div class="flex shrink-0 items-center pb-0.5">{{ $after }}</div>
    @else
        @if ($loadingTarget)
            <x-sampaui::button
                type="submit"
                :icon="$buttonIcon"
                rounded
                class="shrink-0 mb-0.5 shadow-xs"
                :disabled="$disabled || $loading"
                :loading="$loading"
                wire:loading.attr="disabled"
                wire:target="{{ $loadingTarget }}"
                aria-label="{{ $buttonLabel }}"
            />
        @else
            <x-sampaui::button
                type="submit"
                :icon="$buttonIcon"
                rounded
                class="shrink-0 mb-0.5 shadow-xs"
                :disabled="$disabled || $loading"
                :loading="$loading"
                aria-label="{{ $buttonLabel }}"
            />
        @endif
    @endisset
</form>
