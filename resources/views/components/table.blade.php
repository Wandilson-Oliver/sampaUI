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
    $paginationButtonClasses = 'inline-flex h-10 min-w-10 items-center justify-center rounded-default border border-border bg-surface px-3 font-semibold text-secondary transition hover:border-primary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/20 disabled:cursor-not-allowed disabled:opacity-50';
    $bleedStyle = $bleed
        ? 'margin-inline: calc(var(--sampaui-card-padding-x, 0px) * -1); width: calc(100% + (var(--sampaui-card-padding-x, 0px) * 2));'
        : '';
    $existingStyle = trim((string) $attributes->get('style'));
    $rootAttributes = $attributes
        ->except('style')
        ->merge([
            'class' => sampaui_classes([
                'overflow-hidden bg-surface',
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
    x-data="{
        allRows: @js($loading ? [] : $renderRows),
        searchQuery: @js($searchTerm),
        selectedRows: @js($normalizedSelectedRows),
        currentPage: {{ (int) $currentPage }},
        perPage: {{ $normalizedPerPage ? (int) $normalizedPerPage : 'null' }},
        sortBy: @js($sortBy),
        sortDirection: @js($normalizedSortDirection),
        get filteredRows() {
            let list = [...this.allRows];
            if (this.searchQuery && String(this.searchQuery).trim() !== '') {
                const q = String(this.searchQuery).toLowerCase().trim();
                list = list.filter(row => {
                    return Object.values(row).some(val => {
                        if (val === null || val === undefined) return false;
                        const text = String(val).replace(/<[^>]*>/g, '').toLowerCase();
                        return text.includes(q);
                    });
                });
            }
            if (this.sortBy) {
                const k = this.sortBy;
                const dir = this.sortDirection === 'desc' ? -1 : 1;
                list.sort((a, b) => {
                    let vA = a[k] !== undefined ? a[k] : '';
                    let vB = b[k] !== undefined ? b[k] : '';
                    if (typeof vA === 'string') {
                        const cleanA = vA.replace(/<[^>]*>/g, '').replace(/[^\d,-]/g, '').replace(',', '.');
                        const numA = parseFloat(cleanA);
                        const cleanB = typeof vB === 'string' ? vB.replace(/<[^>]*>/g, '').replace(/[^\d,-]/g, '').replace(',', '.') : vB;
                        const numB = parseFloat(cleanB);
                        if (!isNaN(numA) && !isNaN(numB)) {
                            return (numA - numB) * dir;
                        }
                        return vA.replace(/<[^>]*>/g, '').localeCompare(vB.replace(/<[^>]*>/g, ''), undefined, { numeric: true, sensitivity: 'base' }) * dir;
                    }
                    if (typeof vA === 'number' && typeof vB === 'number') {
                        return (vA - vB) * dir;
                    }
                    return String(vA).localeCompare(String(vB)) * dir;
                });
            }
            return list;
        },
        get paginatedRows() {
            const list = this.filteredRows;
            if (! this.perPage) return list;
            const start = (this.currentPage - 1) * this.perPage;
            return list.slice(start, start + this.perPage);
        },
        get totalRowsCount() {
            return this.filteredRows.length;
        },
        get totalPagesCount() {
            return this.perPage ? Math.max(1, Math.ceil(this.totalRowsCount / this.perPage)) : 1;
        },
        get visibleRows() {
            return this.paginatedRows.map((r, i) => String(r['{{ $rowKey }}'] !== undefined ? r['{{ $rowKey }}'] : i));
        },
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
            const currentKeys = this.visibleRows;
            this.selectedRows = checked
                ? Array.from(new Set([...this.selectedRows, ...currentKeys]))
                : this.selectedRows.filter((item) => ! currentKeys.includes(item));
            this.notifySelection();
        },
        allVisibleSelected() {
            const currentKeys = this.visibleRows;
            return currentKeys.length > 0 && currentKeys.every((key) => this.selectedRows.includes(String(key)));
        },
        notifySelection() {
            this.$dispatch('table:selection-changed', { selectedRows: this.selectedRows });
        },
        matchesSearch(text) {
            if (! this.searchQuery || ! String(this.searchQuery).trim()) return true;
            return String(text).toLowerCase().includes(String(this.searchQuery).toLowerCase().trim());
        },
        toggleSort(key) {
            if (this.sortBy === key) {
                this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
            } else {
                this.sortBy = key;
                this.sortDirection = 'asc';
            }
            this.currentPage = 1;
            this.$dispatch('table:sorted', { sortBy: this.sortBy, sortDirection: this.sortDirection });
        },
        firstRow() {
            if (this.totalRowsCount === 0) return 0;
            if (! this.perPage) return 1;
            return ((this.currentPage - 1) * this.perPage) + 1;
        },
        lastRow() {
            if (this.totalRowsCount === 0) return 0;
            if (! this.perPage) return this.totalRowsCount;
            return Math.min(this.currentPage * this.perPage, this.totalRowsCount);
        },
    }"
    {{ $rootAttributes }}
>
    @if ($selectable)
        <template x-for="selectedRow in selectedRows" x-bind:key="'selected-row-' + selectedRow">
            <input type="hidden" name="{{ $selectName }}[]" x-bind:value="selectedRow">
        </template>
    @endif

    @if ($showToolbar)
        <div class="flex flex-col gap-4 border-b border-border bg-surface p-4 sm:flex-row sm:items-center sm:justify-between">
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
                            x-model.debounce.150ms="searchQuery"
                        />
                    @endif
                @endif

                @if ($exportHref)
                    <a
                        href="{{ $exportHref }}"
                        @if ($exportHref === '#export')
                            x-on:click.prevent="$dispatch('toast', { message: 'Exportando relatório de clientes em CSV...', variant: 'info' })"
                        @endif
                        class="inline-flex items-center justify-center gap-2 rounded-default border border-border bg-surface px-3 py-2 text-sm font-semibold text-secondary transition hover:border-primary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/20"
                    >
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

    @if ($selectable)
        <div
            x-show="selectedRows && selectedRows.length > 0"
            x-cloak
            x-transition.opacity.duration.150ms
            class="flex flex-wrap items-center justify-between gap-3 border-b border-primary/20 bg-primary/5 px-4 py-2.5 text-xs text-primary"
        >
            <div class="flex items-center gap-2 font-medium">
                <i class="bi bi-check2-circle text-base" aria-hidden="true"></i>
                <span><strong x-text="selectedRows ? selectedRows.length : 0">0</strong> registro(s) selecionado(s)</span>
            </div>
            <div class="flex flex-wrap items-center gap-2.5">
                @isset($selectionActions)
                    {{ $selectionActions }}
                @endisset
                <button
                    type="button"
                    x-on:click="toggleAll(false)"
                    class="cursor-pointer font-medium text-secondary underline hover:text-primary focus:outline-none"
                >
                    Desmarcar todos
                </button>
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
                                                 $sortMethod && $isActiveSort ? 'text-primary' : null,
                                             ]) }}"
                                            @if ($sortMethod)
                                                wire:click="{{ $sortMethod }}('{{ $key }}')"
                                                wire:loading.attr="disabled"
                                                wire:target="{{ $loadingTarget ?? $sortMethod }}"
                                            @else
                                                data-sort-by="{{ $key }}"
                                                data-sort-direction="{{ $nextDirection }}"
                                                x-on:click="toggleSort('{{ $key }}')"
                                                x-bind:class="{ 'text-primary': sortBy === '{{ $key }}' }"
                                            @endif
                                        >
                                            <span>{{ $columnLabel['label'] ?? $columnKey }}</span>
                                            @if ($sortMethod)
                                                <i class="bi bi-{{ $sortIcon }} text-[0.9em]" aria-hidden="true"></i>
                                            @else
                                                <i
                                                    class="bi text-[0.9em]"
                                                    x-bind:class="{
                                                        'bi-sort-up text-primary': sortBy === '{{ $key }}' && sortDirection === 'asc',
                                                        'bi-sort-down text-primary': sortBy === '{{ $key }}' && sortDirection === 'desc',
                                                        'bi-arrow-down-up opacity-40': sortBy !== '{{ $key }}'
                                                    }"
                                                    aria-hidden="true"
                                                ></i>
                                            @endif
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
                    @elseif (! $sortMethod && ! $searchModel && ! $paginationMethod && count($rows) > 0)
                        <template x-for="(row, rowIndex) in paginatedRows" :key="String(row['{{ $rowKey }}'] !== undefined ? row['{{ $rowKey }}'] : rowIndex)">
                            <tr
                                @class([$rowClasses, 'bg-light/30' => $striped])
                                @if ($selectable)
                                    x-bind:class="{ '!bg-primary/5': isSelected(row['{{ $rowKey }}'] !== undefined ? row['{{ $rowKey }}'] : rowIndex) }"
                                @endif
                            >
                                @if ($selectable)
                                    <td class="{{ $cellPadding }} w-12">
                                        <x-sampaui::checkbox
                                            x-bind:value="row['{{ $rowKey }}'] !== undefined ? row['{{ $rowKey }}'] : rowIndex"
                                            x-bind:checked="isSelected(row['{{ $rowKey }}'] !== undefined ? row['{{ $rowKey }}'] : rowIndex)"
                                            x-on:change="toggleRow(row['{{ $rowKey }}'] !== undefined ? row['{{ $rowKey }}'] : rowIndex, $event.target.checked)"
                                            aria-label="Selecionar registro"
                                        />
                                    </td>
                                @endif

                                @foreach ($columns as $columnKey => $columnLabel)
                                    @php
                                        $key = is_array($columnLabel) ? ($columnLabel['key'] ?? $columnKey) : $columnKey;
                                        $align = is_array($columnLabel) ? ($columnLabel['align'] ?? null) : null;
                                    @endphp

                                    <td
                                        @class([$cellPadding, 'text-right' => $align === 'right', 'text-center' => $align === 'center'])
                                        x-html="row['{{ $key }}']"
                                    ></td>
                                @endforeach
                            </tr>
                        </template>

                        <tr x-show="totalRowsCount === 0" x-cloak>
                            <td colspan="{{ max($columnCount, 1) }}" class="{{ $compact ? 'px-3 py-8' : 'px-4 py-12' }} text-center">
                                <div class="mx-auto flex max-w-sm flex-col items-center">
                                    <span class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-light text-secondary/60">
                                        <i class="bi bi-{{ $emptyIcon }} text-xl" aria-hidden="true"></i>
                                    </span>
                                    <p class="mt-3 text-sm font-semibold text-secondary">{{ $emptyTitle ?: $empty }}</p>
                                    <p class="mt-1 text-sm text-secondary/70">{{ $emptyDescription ?: $empty }}</p>
                                    @isset($emptyAction)
                                        <div class="mt-4">{{ $emptyAction }}</div>
                                    @endisset
                                </div>
                            </td>
                        </tr>
                    @else
                        @forelse ($renderRows as $rowIndex => $row)
                            @php
                                $currentRowKey = (string) (data_get($row, $rowKey) ?? $rowIndex);
                            @endphp

                            <tr
                                @class([$rowClasses, 'bg-light/30' => $striped && $rowIndex % 2 === 1])
                                @if ($searchable && ! $searchModel)
                                    x-show="matchesSearch(@js(implode(' ', array_filter(array_map(fn($v) => is_scalar($v) ? strip_tags((string)$v) : '', (array) $row)))))"
                                @endif
                                @if ($selectable)
                                    x-bind:class="isSelected('{{ $currentRowKey }}') ? '!bg-primary/5' : ''"
                                @endif
                            >
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
                                        {!! $value !!}
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
                                        @isset($emptyAction)
                                            <div class="mt-4">{{ $emptyAction }}</div>
                                        @endisset
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
            @if (! $sortMethod && ! $searchModel && ! $paginationMethod && count($rows) > 0)
                <template x-for="(row, rowIndex) in paginatedRows" :key="'m-' + String(row['{{ $rowKey }}'] !== undefined ? row['{{ $rowKey }}'] : rowIndex)">
                    <article class="space-y-3 p-4">
                        @if ($selectable)
                            <x-sampaui::checkbox
                                label="Selecionar registro"
                                x-bind:value="row['{{ $rowKey }}'] !== undefined ? row['{{ $rowKey }}'] : rowIndex"
                                x-bind:checked="isSelected(row['{{ $rowKey }}'] !== undefined ? row['{{ $rowKey }}'] : rowIndex)"
                                x-on:change="toggleRow(row['{{ $rowKey }}'] !== undefined ? row['{{ $rowKey }}'] : rowIndex, $event.target.checked)"
                            />
                        @endif

                        @foreach ($columns as $columnKey => $columnLabel)
                            @php
                                $key = is_array($columnLabel) ? ($columnLabel['key'] ?? $columnKey) : $columnKey;
                                $label = is_array($columnLabel) ? ($columnLabel['label'] ?? $columnKey) : $columnLabel;
                            @endphp
                            <div class="flex items-start justify-between gap-4">
                                <span class="text-xs font-semibold uppercase tracking-wide text-secondary/60">{{ $label }}</span>
                                <span class="min-w-0 text-right text-sm text-secondary" x-html="row['{{ $key }}']"></span>
                            </div>
                        @endforeach
                    </article>
                </template>
            @else
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
                                <span class="min-w-0 text-right text-sm text-secondary">{!! data_get($row, $key) !!}</span>
                            </div>
                        @endforeach
                    </article>
                @empty
                    <div class="p-6 text-center">
                        <p class="text-sm font-semibold text-secondary">{{ $emptyTitle ?: $empty }}</p>
                        <p class="mt-1 text-sm text-secondary/70">{{ $emptyDescription ?: $empty }}</p>
                    </div>
                @endforelse
            @endif
        </div>
    @endif

    @if ($showPagination)
        <div class="flex flex-col gap-3 border-t border-border bg-surface px-4 py-3 text-sm text-secondary/70 sm:flex-row sm:items-center sm:justify-between">
            @isset($pagination)
                {{ $pagination }}
            @else
                <p>
                    Mostrando <span class="font-semibold text-secondary" @if(! $paginationMethod) x-text="firstRow()" @endif>{{ $firstRow }}</span>
                    a <span class="font-semibold text-secondary" @if(! $paginationMethod) x-text="lastRow()" @endif>{{ $lastRow }}</span>
                    de <span class="font-semibold text-secondary" @if(! $paginationMethod) x-text="totalRowsCount" @endif>{{ $totalRows }}</span>
                    registros
                </p>

                <div class="flex flex-wrap items-center gap-2" data-pagination-type="{{ $normalizedPaginationType }}">
                    <button
                        type="button"
                        class="{{ $paginationButtonClasses }} {{ $normalizedPaginationType === 'simple' ? 'gap-2' : '' }}"
                        @disabled($currentPage <= 1)
                        @if ($paginationMethod && $currentPage > 1)
                            wire:click="{{ $paginationMethod }}({{ $currentPage - 1 }})"
                        @else
                            data-page="{{ max(1, $currentPage - 1) }}"
                            x-on:click="currentPage = Math.max(1, currentPage - 1)"
                            x-bind:disabled="currentPage <= 1"
                        @endif
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
                                class="{{ $paginationButtonClasses }} {{ $paginationMethod && $paginationPage === $currentPage ? '!border-primary !bg-primary !text-white hover:!text-white' : '' }}"
                                @if ($paginationMethod)
                                    wire:click="{{ $paginationMethod }}({{ $paginationPage }})"
                                @else
                                    data-page="{{ $paginationPage }}"
                                    x-on:click="currentPage = {{ $paginationPage }}"
                                    x-bind:class="{ '!border-primary !bg-primary !text-white hover:!text-white': currentPage === {{ $paginationPage }} }"
                                    x-bind:aria-current="currentPage === {{ $paginationPage }} ? 'page' : false"
                                @endif
                                @if ($paginationPage === $currentPage) aria-current="page" aria-label="Pagina {{ $paginationPage }}, atual" @else aria-label="Ir para pagina {{ $paginationPage }}" @endif
                            >{{ $paginationPage }}</button>

                            @php $previousPaginationPage = $paginationPage; @endphp
                        @endforeach
                    @else
                        <span class="inline-flex h-10 items-center rounded-default bg-light px-3 font-semibold text-secondary" @if(! $paginationMethod) x-text="currentPage + ' / ' + totalPagesCount" @endif>
                            {{ $currentPage }} / {{ $totalPages }}
                        </span>
                    @endif

                    <button
                        type="button"
                        class="{{ $paginationButtonClasses }} {{ $normalizedPaginationType === 'simple' ? 'gap-2' : '' }}"
                        @disabled($currentPage >= $totalPages)
                        @if ($paginationMethod && $currentPage < $totalPages)
                            wire:click="{{ $paginationMethod }}({{ $currentPage + 1 }})"
                        @else
                            data-page="{{ min($totalPages, $currentPage + 1) }}"
                            x-on:click="currentPage = Math.min(totalPagesCount, currentPage + 1)"
                            x-bind:disabled="currentPage >= totalPagesCount"
                        @endif
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
