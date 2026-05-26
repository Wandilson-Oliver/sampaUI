@props([
    'columns' => [],
    'rows' => [],
    'empty' => 'Nenhum registro encontrado.',
    'striped' => false,
    'hover' => true,
    'bordered' => true,
    'compact' => false,
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
                                <th scope="col" class="{{ $cellPadding }}">
                                    {{ is_array($columnLabel) ? ($columnLabel['label'] ?? $columnKey) : $columnLabel }}
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
                    @forelse ($rows as $rowIndex => $row)
                        <tr @class([$rowClasses, 'bg-light/20' => $striped && $rowIndex % 2 === 1])>
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
