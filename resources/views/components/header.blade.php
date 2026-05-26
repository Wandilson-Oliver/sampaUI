@props([
    'title' => 'Dashboard',
    'subtitle' => null,
    'eyebrow' => null,
    'status' => null,
    'menu' => false,
    'menuEvent' => 'sampaui:sidebar-open',
])

<header {{ $attributes->merge(['class' => 'rounded-default border border-light bg-white px-5 py-4']) }}>
    <div class="flex flex-col gap-4 md:flex-row md:flex-wrap md:items-center md:justify-between">
        <div class="flex min-w-0 flex-1 basis-80 items-center gap-3">
            @if ($menu)
                <button
                    type="button"
                    class="inline-flex h-11 w-11 shrink-0 cursor-pointer items-center justify-center rounded-default border border-light bg-white text-secondary transition hover:border-primary hover:text-primary md:hidden"
                    x-on:click="$dispatch('{{ $menuEvent }}')"
                    aria-label="Abrir navegacao"
                >
                    <i class="bi bi-list text-xl leading-none" aria-hidden="true"></i>
                </button>
            @endif

            <div class="min-w-0">
                @if ($eyebrow)
                    <p class="text-xs font-semibold uppercase tracking-[0.22em] text-primary">{{ $eyebrow }}</p>
                @endif

                <h1 class="truncate text-2xl font-semibold tracking-tight text-slate-950 md:text-3xl">
                    {{ $title }}
                </h1>

                @if ($subtitle)
                    <p class="mt-1 text-sm leading-6 text-secondary">{{ $subtitle }}</p>
                @endif
            </div>
        </div>

        @if ($status || isset($actions))
            <div class="flex w-full flex-wrap items-center gap-3 md:w-auto">
                @if ($status)
                    <span class="inline-flex items-center gap-2 rounded-full border border-light bg-white px-3 py-1.5 text-sm font-medium text-secondary">
                        <span class="h-2 w-2 rounded-full bg-accent"></span>
                        {{ $status }}
                    </span>
                @endif

                @isset($actions)
                    <div class="flex w-full flex-wrap items-center gap-2 md:w-auto">
                        {{ $actions }}
                    </div>
                @endisset
            </div>
        @endif
    </div>
</header>
