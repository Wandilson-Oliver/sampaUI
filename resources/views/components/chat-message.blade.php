@props([
    'from' => 'contact',
    'author' => null,
    'time' => null,
    'status' => null,
    'avatar' => null,
    'showAvatar' => false,
])

@php
    $outgoing = in_array($from, ['me', 'outgoing'], true);
    $system = $from === 'system';
    $normalizedStatus = \Illuminate\Support\Str::lower((string) $status);
    $statusIcon = match (true) {
        in_array($normalizedStatus, ['lida', 'read'], true) => 'check2-all',
        in_array($normalizedStatus, ['entregue', 'delivered'], true) => 'check2-all',
        in_array($normalizedStatus, ['erro', 'falhou', 'failed'], true) => 'exclamation-circle',
        filled($status) => 'check2',
        default => null,
    };
@endphp

@if ($system)
    <div {{ $attributes->merge(['class' => 'flex justify-center py-1']) }} role="status">
        <span class="rounded-full border border-border bg-surface px-3 py-1.5 text-center text-xs font-medium text-secondary/60 shadow-sm shadow-secondary/5">{{ $slot }}</span>
    </div>
@else
    <div {{ $attributes->merge(['class' => $outgoing ? 'flex items-end justify-end gap-2' : 'flex items-end justify-start gap-2']) }}>
        @if ($showAvatar && ! $outgoing)
            <x-sampaui::avatar :src="$avatar" :name="$author" size="sm" class="mb-1 shrink-0" />
        @endif

        <article
            class="{{ sampaui_classes([
                'max-w-[min(36rem,85%)] rounded-default px-4 py-2.5 shadow-sm shadow-secondary/5',
                $outgoing ? 'rounded-br-sm bg-primary text-white' : 'rounded-bl-sm border border-border bg-surface text-secondary',
            ]) }}"
        >
            @if ($author)
                <p class="{{ $outgoing ? 'text-white/80' : 'text-primary' }} mb-1 text-xs font-semibold">{{ $author }}</p>
            @endif

            <div class="whitespace-pre-wrap break-words text-sm leading-6">{{ $slot }}</div>

            @if ($time || $status)
                <div class="{{ $outgoing ? 'text-white/70' : 'text-secondary/45' }} mt-1 flex items-center justify-end gap-1 text-[0.6875rem] font-medium">
                    @if ($time)
                        <time>{{ $time }}</time>
                    @endif
                    @if ($statusIcon)
                        <i class="bi bi-{{ $statusIcon }} {{ in_array($normalizedStatus, ['erro', 'falhou', 'failed'], true) ? 'text-danger' : '' }}" aria-hidden="true"></i>
                        <span class="sr-only">{{ $status }}</span>
                    @endif
                </div>
            @endif
        </article>

        @if ($showAvatar && $outgoing)
            <x-sampaui::avatar :src="$avatar" :name="$author" size="sm" class="mb-1 shrink-0" />
        @endif
    </div>
@endif
