@props([
    'height' => '42rem',
])

<section
    {{ $attributes->merge(['class' => 'grid min-h-0 overflow-hidden rounded-default border border-light bg-white text-secondary shadow-default lg:grid-cols-[22rem_minmax(0,1fr)]']) }}
    style="height: {{ $height }};"
>
    @isset($sidebar)
        <aside class="min-h-0 border-b border-light bg-white lg:border-b-0 lg:border-r">
            {{ $sidebar }}
        </aside>
    @endisset

    <div class="min-h-0 min-w-0">
        {{ $slot }}
    </div>
</section>
