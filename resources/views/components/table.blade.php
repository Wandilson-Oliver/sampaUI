@props([
    'columns' => [],
    'rows' => [],
    'empty' => 'Nenhum registro encontrado.',
    'striped' => false,
    'hover' => true,
    'bordered' => true,
    'compact' => false,
    'sortBy' => null,
    'sortDirection' => 'asc',
    'sortMethod' => null,
])

@php
    $tableClasses = sampaui_classes([
        'min-w-full divide-y divide-light text-left text-sm text-secondary',
    ]);

    $cellPadding = $compact ? 'px-3 py-2' : 'px-4 py-3';
    $rowClasses = sampaui_classes([
        'transition' => $hover,
        $hover ? 'hover:bg-light/30' : null,
    ]);
    $normalizedSortDirection = strtolower((string) $sortDirection) === 'desc' ? 'desc' : 'asc';
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
@endphp

<div {{ $attributes->merge(['class' => sampaui_classes([
    'overflow-hidden rounded-default bg-white',
    $bordered ? 'border border-light' : null,
])]) }}>
    <div class="overflow-x-auto">
        <table class="{{ $tableClasses }}">
            @isset($head)
                {{ $head }}
            @else
                @if (count($columns) > 0)
                    <thead class="bg-light/50 text-xs font-semibold uppercase tracking-[0.22em] text-secondary">
                        <tr>
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

                                <th scope="col" @class([$cellPadding, 'text-right' => $align === 'right', 'text-center' => $align === 'center'])>
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
                                            @else
                                                data-sort-by="{{ $key }}"
                                                data-sort-direction="{{ $nextDirection }}"
                                            @endif
                                            aria-sort="{{ $isActiveSort ? ($normalizedSortDirection === 'asc' ? 'ascending' : 'descending') : 'none' }}"
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
                    @forelse ($renderRows as $rowIndex => $row)
                        <tr @class([$rowClasses, 'bg-light/30' => $striped && $rowIndex % 2 === 1])>
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
                            <td colspan="{{ max(count($columns), 1) }}" class="{{ $cellPadding }} text-center text-secondary/70">
                                {{ $empty }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            @endisset

            {{ $slot }}
        </table>
    </div>
</div>
