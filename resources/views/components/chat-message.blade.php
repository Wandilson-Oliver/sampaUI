@props([
    'from' => 'contact',
    'author' => null,
    'time' => null,
    'status' => null,
])

@php
    $outgoing = $from === 'me' || $from === 'outgoing';
    $system = $from === 'system';
@endphp

@if ($system)
    <div {{ $attributes->merge(['class' => 'flex justify-center']) }}>
        <span class="rounded-full bg-white px-3 py-1 text-xs font-medium text-secondary/70 shadow-sm">{{ $slot }}</span>
    </div>
@else
    <div {{ $attributes->merge(['class' => $outgoing ? 'flex justify-end' : 'flex justify-start']) }}>
        <article class="{{ sampaui_classes([
            'max-w-[min(34rem,82%)] rounded-default px-4 py-2.5 shadow-sm',
            $outgoing ? 'rounded-br-sm bg-primary text-white' : 'rounded-bl-sm bg-white text-secondary',
        ]) }}">
            @if ($author)
                <p class="{{ $outgoing ? 'text-white/80' : 'text-primary' }} mb-1 text-xs font-semibold">{{ $author }}</p>
            @endif

            <div class="text-sm leading-6">{{ $slot }}</div>

            @if ($time || $status)
                <div class="{{ $outgoing ? 'text-white/70' : 'text-secondary/55' }} mt-1 flex items-center justify-end gap-1 text-[0.68rem] font-medium">
                    @if ($time)
                        <span>{{ $time }}</span>
                    @endif
                    @if ($status)
                        <i class="bi bi-check2-all" aria-hidden="true"></i>
                        <span class="sr-only">{{ $status }}</span>
                    @endif
                </div>
            @endif
        </article>
    </div>
@endif
