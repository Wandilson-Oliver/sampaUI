@props([
    'value' => 0,
    'max' => 100,
    'label' => null,
    'showValue' => false,
    'variant' => 'primary',
])

@php
    $percent = max(0, min(100, ($max > 0 ? ((float) $value / (float) $max) * 100 : 0)));
    $customClasses = (string) $attributes->get('class', '');
    $classes = sampaui_merge_tailwind_classes('space-y-2', $customClasses);
@endphp

<div {{ $attributes->except('class')->merge(['class' => $classes]) }}>
    @if ($label || $showValue)
        <div class="flex items-center justify-between gap-3 text-sm font-medium text-secondary dark:text-slate-200">
            <span>{{ $label }}</span>
            @if ($showValue)<span>{{ round($percent) }}%</span>@endif
        </div>
    @endif
    <div class="h-2 w-full overflow-hidden rounded-full bg-light dark:bg-slate-800" role="progressbar" aria-valuenow="{{ $value }}" aria-valuemin="0" aria-valuemax="{{ $max }}">
        <div class="{{ sampaui_classes(['h-full rounded-full transition-all', sampaui_progress_variant_classes($variant)]) }}" style="width: {{ $percent }}%;"></div>
    </div>
</div>
