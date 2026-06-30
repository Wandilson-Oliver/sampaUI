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
    'flush' => false,
    'bleed' => false,
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
    'paginationType' => 'simple',
    'selectable' => false,
    'selectedRows' => [],
    'selectName' => 'selected',
    'rowKey' => 'id',
    'exportHref' => null,
    'exportLabel' => 'Exportar',
])

@php
    $normalizedSortDirection = strtolower((string) $sortDirection) === 'desc' ? 'desc' : 'asc';
    $normalizedPaginationType = in_array($paginationType, ['simple', 'numbers', 'compact'], true)
        ? $paginationType
        : 'simple';
    $columnCount = count($columns) + ($selectable ? 1 : 0);
    $tableClasses = sampaui_classes([
        'min-w-full divide-y divide-border text-left text-sm text-secondary',
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
    $paginationPages = collect(range(max(1, $currentPage - 1), min($totalPages, $currentPage + 1)))
        ->when($totalPages > 1, fn ($items) => $items->push(1, $totalPages))
        ->unique()
        ->sort()
        ->values()
        ->all();
    $paginationButtonClasses = 'inline-flex h-10 min-w-10 items-center justify-center rounded-default border border-secondary/20 bg-white px-3 font-semibold text-secondary transition hover:border-primary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/20 disabled:cursor-not-allowed disabled:opacity-50';
    $bleedStyle = $bleed
        ? 'margin-inline: calc(var(--sampaui-card-padding-x, 0px) * -1); width: calc(100% + (var(--sampaui-card-padding-x, 0px) * 2));'
        : '';
    $existingStyle = trim((string) $attributes->get('style'));
    $rootAttributes = $attributes
        ->except('style')
        ->merge([
            'class' => sampaui_classes([
                'overflow-hidden bg-white',
                'rounded-none border-0 shadow-none' => $flush,
                'rounded-default shadow-sm shadow-secondary/5' => ! $flush,
                'border border-border' => $bordered && ! $flush,
            ]),
        ]);
    $rootStyle = trim($bleedStyle.' '.$existingStyle);

    if ($rootStyle !== '') {
        $rootAttributes = $rootAttributes->merge(['style' => $rootStyle]);
    }
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
                this.notifySelection();
            },
            toggleAll(checked) {
                this.selectedRows = checked
                    ? Array.from(new Set([...this.selectedRows, ...this.visibleRows]))
                    : this.selectedRows.filter((item) => ! this.visibleRows.includes(item));
                this.notifySelection();
            },
            allVisibleSelected() {
                return this.visibleRows.length > 0 && this.visibleRows.every((key) => this.selectedRows.includes(String(key)));
            },
            notifySelection() {
                this.$dispatch('table:selection-changed', { selectedRows: this.selectedRows });
            },
        }"
    @endif
    {{ $rootAttributes }}
>
    @if ($selectable)
        <template x-for="selectedRow in selectedRows" x-bind:key="'selected-row-' + selectedRow">
            <input type="hidden" name="{{ $selectName }}[]" x-bind:value="selectedRow">
        </template>
    @endif

    @if ($showToolbar)
        <div class="flex flex-col gap-4 border-b border-border bg-white p-4 sm:flex-row sm:items-center sm:justify-between">
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

                @if ($searchable && ! isset($filters))
                    @if ($searchModel)
                        <x-sampaui::input
                            type="search"
                            :name="$searchName"
                            :value="$search"
                            :placeholder="$searchPlaceholder"
                            icon="search"
                            class="sm:min-w-64"
                            wire:model.live.debounce.300ms="{{ $searchModel }}"
                        />
                    @else
                        <x-sampaui::input
                            type="search"
                            :name="$searchName"
                            :value="$search"
                            :placeholder="$searchPlaceholder"
                            icon="search"
                            class="sm:min-w-64"
                        />
                    @endif
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
                                    <x-sampaui::checkbox
                                        value="all"
                                        x-bind:checked="allVisibleSelected()"
                                        x-on:change="toggleAll($event.target.checked)"
                                        aria-label="Selecionar todos os registros visiveis"
                                    />
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
                <tbody class="divide-y divide-border">
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
                                        <x-sampaui::checkbox
                                            :value="$currentRowKey"
                                            x-bind:checked="isSelected($el.value)"
                                            x-on:change="toggleRow($el.value, $event.target.checked)"
                                            aria-label="Selecionar registro {{ $currentRowKey }}"
                                        />
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
        <div class="divide-y divide-border sm:hidden">
            @forelse ($renderRows as $rowIndex => $row)
                @php
                    $currentRowKey = (string) (data_get($row, $rowKey) ?? $rowIndex);
                @endphp

                <article class="space-y-3 p-4">
                    @if ($selectable)
                        <x-sampaui::checkbox
                            label="Selecionar registro"
                            :value="$currentRowKey"
                            x-bind:checked="isSelected($el.value)"
                            x-on:change="toggleRow($el.value, $event.target.checked)"
                        />
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
        <div class="flex flex-col gap-3 border-t border-border bg-white px-4 py-3 text-sm text-secondary/70 sm:flex-row sm:items-center sm:justify-between">
            @isset($pagination)
                {{ $pagination }}
            @else
                <p>
                    Mostrando <span class="font-semibold text-secondary">{{ $firstRow }}</span>
                    a <span class="font-semibold text-secondary">{{ $lastRow }}</span>
                    de <span class="font-semibold text-secondary">{{ $totalRows }}</span>
                    registros
                </p>

                <div class="flex flex-wrap items-center gap-2" data-pagination-type="{{ $normalizedPaginationType }}">
                    <button
                        type="button"
                        class="{{ $paginationButtonClasses }} {{ $normalizedPaginationType === 'simple' ? 'gap-2' : '' }}"
                        @disabled($currentPage <= 1)
                        @if ($paginationMethod && $currentPage > 1) wire:click="{{ $paginationMethod }}({{ $currentPage - 1 }})" @else data-page="{{ max(1, $currentPage - 1) }}" @endif
                        aria-label="Pagina anterior"
                    >
                        <i class="bi bi-chevron-left" aria-hidden="true"></i>
                        @if ($normalizedPaginationType === 'simple')
                            <span>Anterior</span>
                        @endif
                    </button>

                    @if ($normalizedPaginationType === 'numbers')
                        @php $previousPaginationPage = null; @endphp
                        @foreach ($paginationPages as $paginationPage)
                            @if (! is_null($previousPaginationPage) && $paginationPage > $previousPaginationPage + 1)
                                <span class="inline-flex h-10 items-center px-1 font-semibold text-secondary/60" aria-hidden="true">...</span>
                            @endif

                            <button
                                type="button"
                                class="{{ $paginationButtonClasses }} {{ $paginationPage === $currentPage ? '!border-primary !bg-primary !text-white hover:!text-white' : '' }}"
                                @if ($paginationMethod) wire:click="{{ $paginationMethod }}({{ $paginationPage }})" @else data-page="{{ $paginationPage }}" @endif
                                @if ($paginationPage === $currentPage) aria-current="page" aria-label="Pagina {{ $paginationPage }}, atual" @else aria-label="Ir para pagina {{ $paginationPage }}" @endif
                            >{{ $paginationPage }}</button>

                            @php $previousPaginationPage = $paginationPage; @endphp
                        @endforeach
                    @else
                        <span class="inline-flex h-10 items-center rounded-default bg-light px-3 font-semibold text-secondary">
                            {{ $currentPage }} / {{ $totalPages }}
                        </span>
                    @endif

                    <button
                        type="button"
                        class="{{ $paginationButtonClasses }} {{ $normalizedPaginationType === 'simple' ? 'gap-2' : '' }}"
                        @disabled($currentPage >= $totalPages)
                        @if ($paginationMethod && $currentPage < $totalPages) wire:click="{{ $paginationMethod }}({{ $currentPage + 1 }})" @else data-page="{{ min($totalPages, $currentPage + 1) }}" @endif
                        aria-label="Proxima pagina"
                    >
                        @if ($normalizedPaginationType === 'simple')
                            <span>Proxima</span>
                        @endif
                        <i class="bi bi-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
            @endisset
        </div>
    @endif
</div>
