@props([
    'variant' => 'primary',
    'pulse' => false,
    'label' => null,
])

<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 text-sm font-medium text-secondary']) }}>
    <span class="relative inline-flex h-2.5 w-2.5">
        @if ($pulse)
            <span class="{{ sampaui_classes(['absolute inline-flex h-full w-full animate-ping rounded-full opacity-40', sampaui_progress_variant_classes($variant)]) }}"></span>
        @endif
        <span class="{{ sampaui_classes(['relative inline-flex h-2.5 w-2.5 rounded-full', sampaui_progress_variant_classes($variant)]) }}"></span>
    </span>
    @if ($label || trim($slot->toHtml()) !== '')
        <span>{{ $label ?? $slot }}</span>
    @endif
</span>
