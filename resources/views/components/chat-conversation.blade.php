@props([
    'name' => 'Contato',
    'subtitle' => null,
    'avatar' => null,
    'status' => 'online',
])

<section {{ $attributes->merge(['class' => 'flex h-full min-h-0 flex-col bg-light/60']) }}>
    <header class="flex items-center justify-between gap-4 border-b border-light bg-white px-4 py-3">
        <div class="flex min-w-0 items-center gap-3">
            <x-sampaui::avatar :src="$avatar" :name="$name" :status="$status" />
            <div class="min-w-0">
                <h2 class="truncate text-sm font-semibold text-primary">{{ $name }}</h2>
                @if ($subtitle)
                    <p class="mt-0.5 truncate text-xs font-medium text-secondary/70">{{ $subtitle }}</p>
                @endif
            </div>
        </div>

        @isset($actions)
            <div class="flex shrink-0 items-center gap-2">{{ $actions }}</div>
        @endisset
    </header>

    <div class="min-h-0 flex-1 overflow-y-auto px-4 py-5">
        <div class="mx-auto flex max-w-3xl flex-col gap-3">
            {{ $slot }}
        </div>
    </div>

    @isset($composer)
        <footer class="border-t border-light bg-white p-3">
            {{ $composer }}
        </footer>
    @endisset
</section>
