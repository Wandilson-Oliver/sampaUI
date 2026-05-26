@props([
    'lines' => 1,
    'circle' => false,
])

@if ($lines > 1)
    <div {{ $attributes->merge(['class' => 'space-y-2']) }}>
        @for ($i = 0; $i < $lines; $i++)
            <span class="block h-3 animate-pulse rounded-full bg-light {{ $i === ((int) $lines - 1) ? 'w-2/3' : 'w-full' }}"></span>
        @endfor
    </div>
@else
    <span {{ $attributes->merge(['class' => sampaui_classes(['block animate-pulse bg-light', $circle ? 'aspect-square rounded-full' : 'h-4 rounded-full'])]) }}></span>
@endif
