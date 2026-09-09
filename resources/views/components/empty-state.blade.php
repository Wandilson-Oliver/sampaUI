@props([
    'title' => 'Nenhum registro encontrado',
    'description' => null,
    'icon' => 'inbox',
])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center rounded-default border border-dashed border-border dark:border-slate-800 bg-surface bg-white dark:bg-slate-900 px-6 py-10 text-center']) }}>
    <span class="inline-flex h-14 w-14 items-center justify-center rounded-full bg-light dark:bg-slate-800 text-primary">
        <i class="bi bi-{{ $icon }} text-2xl" aria-hidden="true"></i>
    </span>
    <h3 class="mt-4 text-base font-semibold text-secondary dark:text-slate-100">{{ $title }}</h3>
    @if ($description)
        <p class="mt-2 max-w-md text-sm leading-6 text-secondary/80 dark:text-slate-400">{{ $description }}</p>
    @endif
    @isset($actions)
        <div class="mt-5 flex flex-wrap justify-center gap-2">{{ $actions }}</div>
    @endisset
</div>
