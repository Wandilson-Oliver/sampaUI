@props([
    'items' => [],
    'placeholder' => 'Buscar comando...',
    'openEvent' => 'sampaui:command-open',
])

<div
    x-data="{ open: false, query: '' }"
    x-on:{{ $openEvent }}.window="open = true; $nextTick(() => $refs.search?.focus())"
    x-on:keydown.escape.window="open = false"
>
    <div x-cloak x-show="open" x-transition.opacity class="fixed inset-0 z-50 flex items-start justify-center bg-primary/20 px-4 pt-[12vh] backdrop-blur-[2px]" x-on:click.self="open = false">
        <div {{ $attributes->merge(['class' => 'w-full max-w-2xl overflow-hidden rounded-lg border border-border bg-white']) }}>
            <div class="flex items-center gap-3 border-b border-border px-4 py-3">
                <i class="bi bi-search text-secondary" aria-hidden="true"></i>
                <input x-ref="search" x-model="query" type="search" placeholder="{{ $placeholder }}" class="w-full border-0 bg-transparent text-base text-secondary outline-none placeholder:text-secondary ">
            </div>
            <div class="max-h-80 overflow-y-auto p-2">
                @foreach ($items as $item)
                    <a
                        href="{{ $item['href'] ?? '#' }}"
                        class="flex items-center gap-3 rounded-default px-3 py-2 text-sm text-secondary transition hover:bg-light/50 hover:text-primary"
                        x-show="@js(\Illuminate\Support\Str::lower($item['label'] ?? '')) .includes(query.toLowerCase())"
                    >
                        @if (! empty($item['icon']))<i class="bi bi-{{ $item['icon'] }}" aria-hidden="true"></i>@endif
                        <span>{{ $item['label'] ?? 'Comando' }}</span>
                    </a>
                @endforeach
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
