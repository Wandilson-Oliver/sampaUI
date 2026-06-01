@props([
    'icon' => null,
])

<span {{ $attributes->merge(['class' => 'relative inline-block h-11 w-16 shrink-0']) }} aria-hidden="true">
    <span class="absolute left-0 top-0 h-9 w-7 rounded-[1.15rem] rounded-br-md bg-primary"></span>
    <span class="absolute left-7 top-0 h-9 w-7 rounded-[1.15rem] bg-light"></span>
    <span class="absolute bottom-0 left-0 h-6 w-7 rounded-br-[1.4rem] rounded-tl-[1.4rem] bg-secondary"></span>
    <span class="absolute left-[1.62rem] top-7 h-3 w-3 rounded-full bg-accent"></span>

    @if ($icon)
        <span class="absolute inset-0 flex items-center justify-center text-white">
            <i class="bi bi-{{ $icon }} text-lg leading-none"></i>
        </span>
    @endif
</span>
