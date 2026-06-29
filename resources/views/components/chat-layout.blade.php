@props([
    'height' => '42rem',
    'mobilePanel' => 'sidebar',
])

<section
    x-data="{ mobilePanel: @js($mobilePanel === 'conversation' ? 'conversation' : 'sidebar') }"
    x-on:chat:open-conversation="mobilePanel = 'conversation'"
    x-on:chat:back="mobilePanel = 'sidebar'"
    {{ $attributes->merge(['class' => 'grid min-h-0 overflow-hidden rounded-default border border-border bg-surface text-secondary shadow-sm shadow-secondary/5 lg:grid-cols-[22rem_minmax(0,1fr)]']) }}
    style="height: {{ $height }};"
>
    @isset($sidebar)
        <aside
            class="min-h-0 border-border bg-surface lg:block lg:border-r"
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
