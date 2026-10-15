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
    @php
        $customClasses = (string) $attributes->get('class', '');
        $baseClasses = 'w-full max-w-2xl overflow-hidden rounded-lg border border-border dark:border-slate-800 bg-surface bg-white dark:bg-slate-900 shadow-2xl dark:shadow-black/60';
        $classes = sampaui_merge_tailwind_classes($baseClasses, $customClasses);
    @endphp
    <div x-cloak x-show="open" x-transition.opacity class="fixed inset-0 z-50 flex items-start justify-center bg-slate-900/50 px-4 pt-[12vh] backdrop-blur-xs" x-on:click.self="open = false">
        <div {{ $attributes->except('class')->merge(['class' => $classes]) }}>
            <div class="flex items-center gap-3 border-b border-border dark:border-slate-800 px-4 py-3">
                <i class="bi bi-search text-secondary dark:text-slate-400" aria-hidden="true"></i>
                <input x-ref="search" x-model="query" type="search" placeholder="{{ $placeholder }}" class="w-full border-0 bg-transparent text-base text-secondary dark:text-slate-100 outline-none placeholder:text-secondary/50 dark:placeholder:text-slate-500">
            </div>
            <div class="max-h-80 overflow-y-auto p-2">
                @foreach ($items as $item)
                    <a
                        href="{{ $item['href'] ?? '#' }}"
                        class="flex items-center gap-3 rounded-default px-3 py-2 text-sm text-secondary dark:text-slate-200 transition hover:bg-light/50 dark:hover:bg-slate-800 hover:text-primary dark:hover:text-primary"
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
