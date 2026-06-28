@props([
    'title' => 'Nenhum registro encontrado',
    'description' => null,
    'icon' => 'inbox',
])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center rounded-default border border-dashed border-border bg-white px-6 py-10 text-center']) }}>
    <span class="inline-flex h-14 w-14 items-center justify-center rounded-full bg-light text-primary">
        <i class="bi bi-{{ $icon }} text-2xl" aria-hidden="true"></i>
    </span>
    <h3 class="mt-4 text-base font-semibold text-primary">{{ $title }}</h3>
    @if ($description)
        <p class="mt-2 max-w-md text-sm leading-6 text-secondary">{{ $description }}</p>
    @endif
    @isset($actions)
        <div class="mt-5 flex flex-wrap justify-center gap-2">{{ $actions }}</div>
    @endisset
</div>
