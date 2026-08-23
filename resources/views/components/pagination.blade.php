@props([
    'paginator' => null,
    'currentPage' => 1,
    'lastPage' => 1,
    'total' => null,
    'perPage' => null,
    'previousUrl' => null,
    'nextUrl' => null,
    'window' => 1,
    'wireMethod' => null,
    'simple' => false,
    'compact' => false,
])

@php
    if ($paginator) {
        $currentPage = method_exists($paginator, 'currentPage') ? $paginator->currentPage() : $currentPage;
        $lastPage = method_exists($paginator, 'lastPage') ? $paginator->lastPage() : $lastPage;
        $total = method_exists($paginator, 'total') ? $paginator->total() : $total;
        $perPage = method_exists($paginator, 'perPage') ? $paginator->perPage() : $perPage;
        $previousUrl = method_exists($paginator, 'previousPageUrl') ? $paginator->previousPageUrl() : $previousUrl;
        $nextUrl = method_exists($paginator, 'nextPageUrl') ? $paginator->nextPageUrl() : $nextUrl;
    }

    $currentPage = max((int) $currentPage, 1);
    $lastPage = max((int) $lastPage, 1);
    $window = max((int) $window, 1);
    $start = max(1, $currentPage - $window);
    $end = min($lastPage, $currentPage + $window);
    $pages = collect(range($start, $end))
        ->when($lastPage > 1, fn ($items) => $items->push(1, $lastPage))
        ->unique()
        ->sort()
        ->values()
        ->all();

    $itemBase = sampaui_classes([
        'inline-flex cursor-pointer items-center justify-center rounded-default border border-border bg-surface text-sm font-semibold text-secondary transition hover:border-primary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/20',
        $compact ? 'h-9 min-w-9 px-2' : 'h-11 min-w-11 px-3',
    ]);
    $itemActive = '!border-primary !bg-primary !text-white hover:!text-white';
    $itemDisabled = 'cursor-not-allowed opacity-50';
@endphp

<nav {{ $attributes->merge(['class' => 'flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between']) }} aria-label="Paginacao">
    @if (! is_null($total))
        <p class="text-sm font-medium text-secondary">
            <span class="font-semibold text-primary">{{ $total }}</span> registros
            @if ($perPage)
                <span class="text-secondary/60">· {{ $perPage }} por pagina</span>
            @endif
        </p>
    @endif

    <div class="flex flex-wrap items-center gap-2">
        @if ($wireMethod)
            <button type="button" class="{{ sampaui_classes([$itemBase, $currentPage <= 1 ? $itemDisabled : null]) }}" wire:click="{{ $wireMethod }}({{ max(1, $currentPage - 1) }})" wire:loading.attr="disabled" wire:target="{{ $wireMethod }}" @disabled($currentPage <= 1) aria-label="Pagina anterior">
                <i class="bi bi-chevron-left"></i>
            </button>
        @else
            <a href="{{ $previousUrl ?: '#' }}" class="{{ sampaui_classes([$itemBase, ! $previousUrl ? $itemDisabled : null]) }}" @if (! $previousUrl) aria-disabled="true" tabindex="-1" @endif aria-label="Pagina anterior">
                <i class="bi bi-chevron-left"></i>
            </a>
        @endif

        @unless ($simple)
            @php $previousPage = null; @endphp
            @foreach ($pages as $page)
                @if (! is_null($previousPage) && $page > $previousPage + 1)
                    <span class="inline-flex {{ $compact ? 'h-9' : 'h-11' }} items-center px-2 text-sm font-semibold text-secondary/60" aria-hidden="true">...</span>
                @endif

                @if ($wireMethod)
                    <button type="button" class="{{ sampaui_classes([$itemBase, $page === $currentPage ? $itemActive : null]) }}" wire:click="{{ $wireMethod }}({{ $page }})" wire:loading.attr="disabled" wire:target="{{ $wireMethod }}" @if ($page === $currentPage) aria-current="page" aria-label="Pagina {{ $page }}, atual" @else aria-label="Ir para pagina {{ $page }}" @endif>
                        <span>{{ $page }}</span>
                    </button>
                @else
                    @php
                        $url = $paginator && method_exists($paginator, 'url') ? $paginator->url($page) : request()->fullUrlWithQuery(['page' => $page]);
                    @endphp
                    <a href="{{ $url }}" class="{{ sampaui_classes([$itemBase, $page === $currentPage ? $itemActive : null]) }}" @if ($page === $currentPage) aria-current="page" @endif>
                        <span>{{ $page }}</span>
                    </a>
                @endif

                @php $previousPage = $page; @endphp
            @endforeach
        @endunless

        @if ($wireMethod)
            <button type="button" class="{{ sampaui_classes([$itemBase, $currentPage >= $lastPage ? $itemDisabled : null]) }}" wire:click="{{ $wireMethod }}({{ min($lastPage, $currentPage + 1) }})" wire:loading.attr="disabled" wire:target="{{ $wireMethod }}" @disabled($currentPage >= $lastPage) aria-label="Proxima pagina">
                <i class="bi bi-chevron-right"></i>
            </button>
        @else
            <a href="{{ $nextUrl ?: '#' }}" class="{{ sampaui_classes([$itemBase, ! $nextUrl ? $itemDisabled : null]) }}" @if (! $nextUrl) aria-disabled="true" tabindex="-1" @endif aria-label="Proxima pagina">
                <i class="bi bi-chevron-right"></i>
            </a>
        @endif
    </div>
</nav>
