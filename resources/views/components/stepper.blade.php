@props([
    'steps' => [],
    'current' => 1,
])

<ol {{ $attributes->merge(['class' => 'flex flex-col gap-4 md:flex-row']) }}>
    @foreach ($steps as $index => $step)
        @php
            $number = is_int($index) ? $index + 1 : (int) $index;
            $done = $number < $current;
            $active = $number === (int) $current;
        @endphp
        <li class="flex flex-1 items-start gap-3">
            <span class="{{ sampaui_classes(['inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full border text-sm font-semibold', $done || $active ? 'border-primary bg-primary text-white' : 'border-border dark:border-slate-800 bg-white dark:bg-slate-900 text-secondary dark:text-slate-200']) }}">
                @if ($done)<i class="bi bi-check2" aria-hidden="true"></i>@else{{ $number }}@endif
            </span>
            <span class="min-w-0">
                <span class="{{ sampaui_classes(['block text-sm font-semibold', $active ? 'text-primary' : 'text-secondary dark:text-slate-200']) }}">{{ is_array($step) ? ($step['label'] ?? '') : $step }}</span>
                @if (is_array($step) && ! empty($step['description']))
                    <span class="mt-1 block text-sm leading-5 text-secondary/75 dark:text-slate-400">{{ $step['description'] }}</span>
                @endif
            </span>
        </li>
    @endforeach
</ol>
