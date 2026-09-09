@props([
    'height' => '44rem',
    'mobilePanel' => 'sidebar',
])

<section
    x-data="{ mobilePanel: @js($mobilePanel === 'conversation' ? 'conversation' : 'sidebar') }"
    x-on:chat:open-conversation="mobilePanel = 'conversation'"
    x-on:chat:back="mobilePanel = 'sidebar'"
    {{ $attributes->merge(['class' => 'grid min-h-0 overflow-hidden rounded-default border border-border/80 dark:border-slate-800 bg-surface bg-white dark:bg-slate-900 text-secondary dark:text-slate-100 shadow-sm shadow-secondary/5 dark:shadow-black/20 transition-all duration-200 lg:grid-cols-[22rem_minmax(0,1fr)] xl:grid-cols-[24rem_minmax(0,1fr)]']) }}
    style="height: {{ $height }};"
>
    @isset($sidebar)
        <aside
            class="min-h-0 border-border/80 dark:border-slate-800 bg-surface bg-white dark:bg-slate-900 lg:block lg:border-r"
            x-bind:class="mobilePanel === 'conversation' ? 'hidden lg:block' : 'block'"
            aria-label="Lista de conversas"
        >
            {{ $sidebar }}
        </aside>
    @endisset

    <div
        class="min-h-0 min-w-0 lg:block"
        x-bind:class="mobilePanel === 'sidebar' ? 'hidden lg:block' : 'block'"
    >
        {{ $slot }}
    </div>
</section>
