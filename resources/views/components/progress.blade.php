@props([
    'value' => 0,
    'max' => 100,
    'label' => null,
    'showValue' => false,
    'variant' => 'primary',
])

@php
    $percent = max(0, min(100, ($max > 0 ? ((float) $value / (float) $max) * 100 : 0)));
    $colors = [
        'primary' => 'bg-primary',
        'secondary' => 'bg-secondary',
        'accent' => 'bg-accent',
        'danger' => 'bg-danger',
        'success' => 'bg-primary',
        'warning' => 'bg-accent',
        'info' => 'bg-secondary',
        'light' => 'bg-light',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'space-y-2']) }}>
    @if ($label || $showValue)
        <div class="flex items-center justify-between gap-3 text-sm font-medium text-secondary">
            <span>{{ $label }}</span>
            @if ($showValue)<span>{{ round($percent) }}%</span>@endif
        </div>
    @endif
    <div class="h-2 w-full overflow-hidden rounded-full bg-light" role="progressbar" aria-valuenow="{{ $value }}" aria-valuemin="0" aria-valuemax="{{ $max }}">
        <div class="{{ sampaui_classes(['h-full rounded-full transition-all', $colors[$variant] ?? $colors['primary']]) }}" style="width: {{ $percent }}%;"></div>
    </div>
</div>
