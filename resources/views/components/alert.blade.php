@props([
    'variant' => 'info',
    'type' => null,
    'title' => null,
    'icon' => null,
    'role' => null,
])

@php
    $tone = $type ?? $variant;
    $ui = sampaui_alert_tone($tone);
    $iconName = $icon === false ? null : ($icon ?: $ui['defaultIcon']);
    $alertRole = $role ?: $ui['role'];
    $classes = sampaui_classes([
        'flex w-full items-start gap-3 rounded-default border px-4 py-4 text-sm',
        $ui['wrap'],
    ]);
@endphp

<div role="{{ $alertRole }}" {{ $attributes->merge(['class' => $classes]) }}>
    @if ($iconName)
        <i class="bi bi-{{ $iconName }} mt-0.5 text-base {{ $ui['icon'] }}" aria-hidden="true"></i>
    @endif

    <div class="min-w-0 flex-1">
        @if ($title)
            <p class="font-medium text-primary">{{ $title }}</p>
        @endif

        <div @class(['mt-1' => $title])>
            {{ $slot }}
        </div>
    </div>
</div>
