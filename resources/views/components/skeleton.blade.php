@props([
    'lines' => 1,
    'circle' => false,
])

@php
    $customClasses = (string) $attributes->get('class', '');
@endphp

@if ($lines > 1)
    <div {{ $attributes->except('class')->merge(['class' => sampaui_merge_tailwind_classes('space-y-2', $customClasses)]) }}>
        @for ($i = 0; $i < $lines; $i++)
            <span class="block h-3 animate-pulse rounded-full bg-light dark:bg-slate-800 {{ $i === ((int) $lines - 1) ? 'w-2/3' : 'w-full' }}"></span>
        @endfor
    </div>
@else
    @php
        $baseClasses = sampaui_classes(['block animate-pulse bg-light dark:bg-slate-800', $circle ? 'aspect-square rounded-full' : 'h-4 rounded-full']);
        $classes = sampaui_merge_tailwind_classes($baseClasses, $customClasses);
    @endphp
    <span {{ $attributes->except('class')->merge(['class' => $classes]) }}></span>
@endif
