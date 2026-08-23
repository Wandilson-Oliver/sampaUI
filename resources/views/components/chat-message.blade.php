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
        in_array($normalizedStatus, ['enviada', 'sent'], true) => 'check2',
        filled($status) => 'check2',
        default => null,
    };
    $isRead = in_array($normalizedStatus, ['lida', 'read'], true);
    $isError = in_array($normalizedStatus, ['erro', 'falhou', 'failed'], true);
@endphp

@if ($system)
    <div {{ $attributes->merge(['class' => 'flex justify-center my-2']) }} role="status">
        <span class="inline-flex items-center gap-1.5 rounded-full border border-border/80 bg-surface px-3.5 py-1 text-center text-xs font-medium text-secondary/70 shadow-xs">
            <i class="bi bi-info-circle text-secondary/50" aria-hidden="true"></i>
            {{ $slot }}
        </span>
    </div>
@else
    <div {{ $attributes->merge(['class' => $outgoing ? 'flex items-end justify-end gap-2.5' : 'flex items-end justify-start gap-2.5']) }}>
        @if ($showAvatar && ! $outgoing)
            <div class="mb-0.5 shrink-0">
                <x-sampaui::avatar :src="$avatar" :name="$author" size="sm" />
            </div>
        @endif

        <article
            class="{{ sampaui_classes([
                'max-w-[min(38rem,85%)] px-4 py-3 shadow-xs transition-shadow',
                $outgoing
                    ? 'rounded-default rounded-br-sm bg-primary text-white shadow-primary/10'
                    : 'rounded-default rounded-bl-sm border border-border bg-surface text-secondary',
            ]) }}"
        >
            @if ($author)
                <p class="{{ $outgoing ? 'text-white/80' : 'text-primary' }} mb-1 text-xs font-bold tracking-tight">
                    {{ $author }}
                </p>
            @endif

            <div class="whitespace-pre-wrap break-words text-sm leading-relaxed">
                {{ $slot }}
            </div>

            @if ($time || $status)
                <div class="{{ $outgoing ? 'text-white/75' : 'text-secondary/50' }} mt-1.5 flex items-center justify-end gap-1.5 text-[0.6875rem] font-medium">
                    @if ($time)
                        <time>{{ $time }}</time>
                    @endif
                    @if ($statusIcon)
                        <i
                            class="bi bi-{{ $statusIcon }} {{ $isRead ? ($outgoing ? 'text-sky-300' : 'text-primary') : '' }} {{ $isError ? ($outgoing ? 'text-rose-300' : 'text-danger') : '' }}"
                            aria-hidden="true"
                        ></i>
                        <span class="sr-only">{{ $status }}</span>
                    @endif
                </div>
            @endif
        </article>

        @if ($showAvatar && $outgoing)
            <div class="mb-0.5 shrink-0">
                <x-sampaui::avatar :src="$avatar" :name="$author" size="sm" />
            </div>
        @endif
    </div>
@endif
