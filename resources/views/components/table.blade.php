@props([
    'columns' => [],
    'rows' => [],
    'empty' => 'Nenhum registro encontrado.',
    'emptyTitle' => 'Nenhum registro encontrado',
    'emptyDescription' => null,
    'emptyIcon' => 'inbox',
    'title' => null,
    'description' => null,
    'striped' => false,
    'hover' => true,
    'bordered' => true,
    'compact' => false,
    'sortBy' => null,
    'sortDirection' => 'asc',
    'sortMethod' => null,
    'stickyHeader' => false,
    'mobileCards' => false,
    'loading' => false,
    'loadingTarget' => null,
    'searchable' => false,
    'search' => null,
    'searchName' => 'search',
    'searchModel' => null,
    'searchPlaceholder' => 'Buscar registros...',
    'perPage' => null,
    'page' => 1,
    'total' => null,
    'paginationMethod' => null,
    'selectable' => false,
    'selectedRows' => [],
    'selectName' => 'selected',
    'rowKey' => 'id',
    'exportHref' => null,
    'exportLabel' => 'Exportar',
])

@php
    $normalizedSortDirection = strtolower((string) $sortDirection) === 'desc' ? 'desc' : 'asc';
    $columnCount = count($columns) + ($selectable ? 1 : 0);
    $tableClasses = sampaui_classes([
        'min-w-full divide-y divide-light text-left text-sm text-secondary',
    ]);
    $cellPadding = $compact ? 'px-3 py-2' : 'px-4 py-3';
    $rowClasses = sampaui_classes([
        'transition' => $hover,
        $hover ? 'hover:bg-light/30' : null,
    ]);
    $sortableColumnKeys = collect($columns)
        ->mapWithKeys(function (mixed $columnLabel, mixed $columnKey): array {
            if (! is_array($columnLabel) || ! ($columnLabel['sortable'] ?? false)) {
                return [];
            }

            $key = $columnLabel['key'] ?? $columnKey;

            return [(string) $key => true];
        });
    $renderRows = $rows;

    if ($sortBy && ! $sortMethod && $sortableColumnKeys->has((string) $sortBy)) {
        $renderRows = collect($rows)
            ->sortBy(fn (mixed $row): mixed => data_get($row, $sortBy), SORT_REGULAR, $normalizedSortDirection === 'desc')
            ->values()
            ->all();
    }

    $searchTerm = trim((string) ($search ?? ''));
    $filteredRows = collect($renderRows)->values();

    if ($searchable && $searchTerm !== '' && ! $searchModel && count($columns) > 0) {
        $needle = mb_strtolower($searchTerm);
        $filteredRows = $filteredRows
            ->filter(function (mixed $row) use ($columns, $needle): bool {
                foreach ($columns as $columnKey => $columnLabel) {
                    $key = is_array($columnLabel) ? ($columnLabel['key'] ?? $columnKey) : $columnKey;
                    $value = data_get($row, $key);

                    if (is_scalar($value) && str_contains(mb_strtolower((string) $value), $needle)) {
                        return true;
                    }
                }

                return false;
            })
            ->values();
    }

    $totalRows = is_null($total) ? $filteredRows->count() : max(0, (int) $total);
    $currentPage = max(1, (int) $page);
    $normalizedPerPage = filled($perPage) ? max(1, (int) $perPage) : null;
    $usesExternalPagination = $normalizedPerPage && ! is_null($total) && $totalRows > $filteredRows->count();
    $totalPages = $normalizedPerPage ? max(1, (int) ceil($totalRows / $normalizedPerPage)) : 1;
    $currentPage = min($currentPage, $totalPages);

    if ($normalizedPerPage && ! $usesExternalPagination) {
        $filteredRows = $filteredRows->slice(($currentPage - 1) * $normalizedPerPage, $normalizedPerPage)->values();
    }

    $renderRows = $filteredRows->all();
    $visibleRowKeys = collect($renderRows)
        ->map(fn (mixed $row, int $index): string => (string) (data_get($row, $rowKey) ?? $index))
        ->values()
        ->all();
    $normalizedSelectedRows = collect($selectedRows)->map(fn (mixed $value): string => (string) $value)->values()->all();
    $firstRow = $totalRows === 0 ? 0 : (($currentPage - 1) * ($normalizedPerPage ?? max($totalRows, 1))) + 1;
    $lastRow = $normalizedPerPage ? min($firstRow + count($renderRows) - 1, $totalRows) : $totalRows;
    $showToolbar = $title || $description || $searchable || $exportHref || isset($toolbar) || isset($filters) || isset($actions);
    $showPagination = $normalizedPerPage || isset($pagination);
@endphp

<div
    @if ($selectable)
        x-data="{
            selectedRows: @js($normalizedSelectedRows),
            visibleRows: @js($visibleRowKeys),
            isSelected(key) {
                return this.selectedRows.includes(String(key));
            },
            toggleRow(key, checked) {
                key = String(key);
                this.selectedRows = checked
                    ? Array.from(new Set([...this.selectedRows, key]))
                    : this.selectedRows.filter((item) => item !== key);
            },
            toggleAll(checked) {
                this.selectedRows = checked
                    ? Array.from(new Set([...this.selectedRows, ...this.visibleRows]))
                    : this.selectedRows.filter((item) => ! this.visibleRows.includes(item));
            },
            allVisibleSelected() {
                return this.visibleRows.length > 0 && this.visibleRows.every((key) => this.selectedRows.includes(String(key)));
            },
        }"
    @endif
    {{ $attributes->merge(['class' => sampaui_classes([
        'overflow-hidden rounded-default bg-white shadow-sm shadow-secondary/5',
        $bordered ? 'border border-light' : null,
    ])]) }}
>
    @if ($showToolbar)
        <div class="flex flex-col gap-4 border-b border-light bg-white p-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="min-w-0">
                @if ($title)
                    <h3 class="truncate text-base font-semibold text-secondary">{{ $title }}</h3>
                @endif

                @if ($description)
                    <p class="mt-1 text-sm text-secondary/70">{{ $description }}</p>
                @endif

                @isset($toolbar)
                    <div @class(['mt-3' => $title || $description])>{{ $toolbar }}</div>
                @endisset
            </div>

            <div class="flex flex-col gap-3 sm:min-w-[22rem] sm:flex-row sm:items-center sm:justify-end">
                @isset($filters)
                    {{ $filters }}
                @endisset

                @if ($searchable)
                    <label class="relative block sm:min-w-64">
                        <span class="sr-only">{{ $searchPlaceholder }}</span>
                        <i class="bi bi-search pointer-events-none absolute inset-y-0 left-3 flex items-center text-sm text-secondary/60" aria-hidden="true"></i>
                        <input
                            type="search"
                            name="{{ $searchName }}"
                            value="{{ $search }}"
                            placeholder="{{ $searchPlaceholder }}"
                            @if ($searchModel) wire:model.live.debounce.300ms="{{ $searchModel }}" @endif
                            class="block w-full rounded-default border border-secondary/20 bg-white py-2 pl-9 pr-3 text-sm text-secondary outline-none transition placeholder:text-secondary/50 hover:border-secondary/30 focus:border-primary focus:ring-2 focus:ring-primary/20"
                        >
                    </label>
                @endif

                @if ($exportHref)
                    <a href="{{ $exportHref }}" class="inline-flex items-center justify-center gap-2 rounded-default border border-secondary/20 bg-white px-3 py-2 text-sm font-semibold text-secondary transition hover:border-primary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                        <i class="bi bi-download" aria-hidden="true"></i>
                        {{ $exportLabel }}
                    </a>
                @endif

                @isset($actions)
                    {{ $actions }}
                @endisset
            </div>
        </div>
    @endif

    <div @class(['overflow-x-auto', 'hidden sm:block' => $mobileCards && count($columns) > 0])>
        <table class="{{ $tableClasses }}" @if ($loading) aria-busy="true" @endif>
            @isset($head)
                {{ $head }}
            @else
                @if (count($columns) > 0)
                    <thead @class(['bg-light/50 text-xs font-semibold uppercase tracking-[0.22em] text-secondary', 'sticky top-0 z-10' => $stickyHeader])>
                        <tr>
                            @if ($selectable)
                                <th scope="col" class="{{ $cellPadding }} w-12">
                                    <input
                                        type="checkbox"
                                        class="h-4 w-4 rounded border-secondary/40 text-primary focus:ring-primary/20"
                                        x-bind:checked="allVisibleSelected()"
                                        x-on:change="toggleAll($event.target.checked)"
                                        aria-label="Selecionar todos os registros visiveis"
                                    >
                                </th>
                            @endif

                            @foreach ($columns as $columnKey => $columnLabel)
                                @php
                                    $key = is_array($columnLabel) ? ($columnLabel['key'] ?? $columnKey) : $columnKey;
                                    $align = is_array($columnLabel) ? ($columnLabel['align'] ?? null) : null;
                                    $sortable = is_array($columnLabel) && ($columnLabel['sortable'] ?? false);
                                    $isActiveSort = $sortable && (string) $sortBy === (string) $key;
                                    $nextDirection = $isActiveSort && $normalizedSortDirection === 'asc' ? 'desc' : 'asc';
                                    $sortIcon = $isActiveSort
                                        ? ($normalizedSortDirection === 'asc' ? 'sort-up' : 'sort-down')
                                        : 'arrow-down-up';
                                @endphp

                                <th scope="col" @class([$cellPadding, 'text-right' => $align === 'right', 'text-center' => $align === 'center']) @if ($sortable) aria-sort="{{ $isActiveSort ? ($normalizedSortDirection === 'asc' ? 'ascending' : 'descending') : 'none' }}" @endif>
                                    @if ($sortable)
                                        <button
                                            type="button"
                                            class="{{ sampaui_classes([
                                                'inline-flex cursor-pointer items-center gap-2 rounded-md text-left transition hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/20',
                                                'ml-auto' => $align === 'right',
                                                'mx-auto' => $align === 'center',
                                                'text-primary' => $isActiveSort,
                                            ]) }}"
                                            @if ($sortMethod)
                                                wire:click="{{ $sortMethod }}('{{ $key }}')"
                                                wire:loading.attr="disabled"
                                                wire:target="{{ $loadingTarget ?? $sortMethod }}"
                                            @else
                                                data-sort-by="{{ $key }}"
                                                data-sort-direction="{{ $nextDirection }}"
                                            @endif
                                        >
                                            <span>{{ $columnLabel['label'] ?? $columnKey }}</span>
                                            <i class="bi bi-{{ $sortIcon }} text-[0.9em]" aria-hidden="true"></i>
                                        </button>
                                    @else
                                        {{ is_array($columnLabel) ? ($columnLabel['label'] ?? $columnKey) : $columnLabel }}
                                    @endif
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                @endif
            @endisset

            @isset($body)
                {{ $body }}
            @else
                <tbody class="divide-y divide-light">
                    @if ($loading)
                        @for ($index = 0; $index < max(3, min((int) ($normalizedPerPage ?? 5), 8)); $index++)
                            <tr>
                                <td colspan="{{ max($columnCount, 1) }}" class="{{ $cellPadding }}">
                                    <div class="h-4 w-full max-w-3xl animate-pulse rounded-default bg-light"></div>
                                </td>
                            </tr>
                        @endfor
                    @else
                        @forelse ($renderRows as $rowIndex => $row)
                            @php
                                $currentRowKey = (string) (data_get($row, $rowKey) ?? $rowIndex);
                            @endphp

                            <tr @class([$rowClasses, 'bg-light/30' => $striped && $rowIndex % 2 === 1])>
                                @if ($selectable)
                                    <td class="{{ $cellPadding }} w-12">
                                        <input
                                            type="checkbox"
                                            name="{{ $selectName }}[]"
                                            value="{{ $currentRowKey }}"
                                            class="h-4 w-4 rounded border-secondary/40 text-primary focus:ring-primary/20"
                                            x-bind:checked="isSelected(@js($currentRowKey))"
                                            x-on:change="toggleRow(@js($currentRowKey), $event.target.checked)"
                                            aria-label="Selecionar registro {{ $currentRowKey }}"
                                        >
                                    </td>
                                @endif

                                @foreach ($columns as $columnKey => $columnLabel)
                                    @php
                                        $key = is_array($columnLabel) ? ($columnLabel['key'] ?? $columnKey) : $columnKey;
                                        $align = is_array($columnLabel) ? ($columnLabel['align'] ?? null) : null;
                                        $value = data_get($row, $key);
                                    @endphp

                                    <td @class([$cellPadding, 'text-right' => $align === 'right', 'text-center' => $align === 'center'])>
                                        {{ $value }}
                                    </td>
                                @endforeach
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ max($columnCount, 1) }}" class="{{ $compact ? 'px-3 py-8' : 'px-4 py-12' }} text-center">
                                    <div class="mx-auto flex max-w-sm flex-col items-center">
                                        <span class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-light text-secondary/60">
                                            <i class="bi bi-{{ $emptyIcon }} text-xl" aria-hidden="true"></i>
                                        </span>
                                        <p class="mt-3 text-sm font-semibold text-secondary">{{ $emptyTitle ?: $empty }}</p>
                                        <p class="mt-1 text-sm text-secondary/70">{{ $emptyDescription ?: $empty }}</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    @endif
                </tbody>
            @endisset

            {{ $slot }}
        </table>
    </div>

    @if ($mobileCards && count($columns) > 0)
        <div class="divide-y divide-light sm:hidden">
            @forelse ($renderRows as $rowIndex => $row)
                @php
                    $currentRowKey = (string) (data_get($row, $rowKey) ?? $rowIndex);
                @endphp

                <article class="space-y-3 p-4">
                    @if ($selectable)
                        <label class="flex items-center gap-3 text-sm font-medium text-secondary">
                            <input
                                type="checkbox"
                                name="{{ $selectName }}[]"
                                value="{{ $currentRowKey }}"
                                class="h-4 w-4 rounded border-secondary/40 text-primary focus:ring-primary/20"
                                x-bind:checked="isSelected(@js($currentRowKey))"
                                x-on:change="toggleRow(@js($currentRowKey), $event.target.checked)"
                            >
                            Selecionar registro
                        </label>
                    @endif

                    @foreach ($columns as $columnKey => $columnLabel)
                        @php
                            $key = is_array($columnLabel) ? ($columnLabel['key'] ?? $columnKey) : $columnKey;
                            $label = is_array($columnLabel) ? ($columnLabel['label'] ?? $columnKey) : $columnLabel;
                        @endphp
                        <div class="flex items-start justify-between gap-4">
                            <span class="text-xs font-semibold uppercase tracking-wide text-secondary/60">{{ $label }}</span>
                            <span class="min-w-0 text-right text-sm text-secondary">{{ data_get($row, $key) }}</span>
                        </div>
                    @endforeach
                </article>
            @empty
                <div class="p-6 text-center">
                    <p class="text-sm font-semibold text-secondary">{{ $emptyTitle ?: $empty }}</p>
                    <p class="mt-1 text-sm text-secondary/70">{{ $emptyDescription ?: $empty }}</p>
                </div>
            @endforelse
        </div>
    @endif

    @if ($showPagination)
        <div class="flex flex-col gap-3 border-t border-light bg-white px-4 py-3 text-sm text-secondary/70 sm:flex-row sm:items-center sm:justify-between">
            @isset($pagination)
                {{ $pagination }}
            @else
                <p>
                    Mostrando <span class="font-semibold text-secondary">{{ $firstRow }}</span>
                    a <span class="font-semibold text-secondary">{{ $lastRow }}</span>
                    de <span class="font-semibold text-secondary">{{ $totalRows }}</span>
                    registros
                </p>

                <div class="flex items-center gap-2">
                    <button
                        type="button"
                        class="inline-flex items-center gap-2 rounded-default border border-secondary/20 px-3 py-2 font-semibold text-secondary transition hover:border-primary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/20 disabled:cursor-not-allowed disabled:opacity-50"
                        @disabled($currentPage <= 1)
                        @if ($paginationMethod && $currentPage > 1) wire:click="{{ $paginationMethod }}({{ $currentPage - 1 }})" @else data-page="{{ max(1, $currentPage - 1) }}" @endif
                    >
                        <i class="bi bi-chevron-left" aria-hidden="true"></i>
                        Anterior
                    </button>

                    <span class="rounded-default bg-light px-3 py-2 font-semibold text-secondary">{{ $currentPage }} / {{ $totalPages }}</span>

                    <button
                        type="button"
                        class="inline-flex items-center gap-2 rounded-default border border-secondary/20 px-3 py-2 font-semibold text-secondary transition hover:border-primary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/20 disabled:cursor-not-allowed disabled:opacity-50"
                        @disabled($currentPage >= $totalPages)
                        @if ($paginationMethod && $currentPage < $totalPages) wire:click="{{ $paginationMethod }}({{ $currentPage + 1 }})" @else data-page="{{ min($totalPages, $currentPage + 1) }}" @endif
                    >
                        Proxima
                        <i class="bi bi-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
            @endisset
        </div>
    @endif
</div>
