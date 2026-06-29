@props([
    'columns' => [],
    'rows' => [],
    'empty' => 'Nenhum registro encontrado.',
    'emptyTitle' => 'Nenhum registro encontrado',
    'emptyDescription' => null,
    'emptyIcon' => 'search',
    'title' => null,
    'description' => null,
    'striped' => false,
    'hover' => true,
    'bordered' => false,
    'flush' => true,
    'bleed' => true,
    'compact' => false,
    'sortBy' => null,
    'sortDirection' => 'asc',
    'sortMethod' => null,
    'stickyHeader' => false,
    'mobileCards' => false,
    'loading' => false,
    'loadingTarget' => null,
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

<x-sampaui::table
    :columns="$columns"
    :rows="$rows"
    :empty="$empty"
    :empty-title="$emptyTitle"
    :empty-description="$emptyDescription"
    :empty-icon="$emptyIcon"
    :title="$title"
    :description="$description"
    :striped="$striped"
    :hover="$hover"
    :bordered="$bordered"
    :flush="$flush"
    :bleed="$bleed"
    :compact="$compact"
    :sort-by="$sortBy"
    :sort-direction="$sortDirection"
    :sort-method="$sortMethod"
    :sticky-header="$stickyHeader"
    :mobile-cards="$mobileCards"
    :loading="$loading"
    :loading-target="$loadingTarget"
    searchable
    :search="$search"
    :search-name="$searchName"
    :search-model="$searchModel"
    :search-placeholder="$searchPlaceholder"
    :per-page="$perPage"
    :page="$page"
    :total="$total"
    :pagination-method="$paginationMethod"
    :pagination-type="$paginationType"
    :selectable="$selectable"
    :selected-rows="$selectedRows"
    :select-name="$selectName"
    :row-key="$rowKey"
    :export-href="$exportHref"
    :export-label="$exportLabel"
    {{ $attributes }}
>
    @isset($toolbar)
        <x-slot:toolbar>{{ $toolbar }}</x-slot:toolbar>
    @endisset

    @isset($filters)
        <x-slot:filters>{{ $filters }}</x-slot:filters>
    @endisset

    @isset($actions)
        <x-slot:actions>{{ $actions }}</x-slot:actions>
    @endisset

    @isset($head)
        <x-slot:head>{{ $head }}</x-slot:head>
    @endisset

    @isset($body)
        <x-slot:body>{{ $body }}</x-slot:body>
    @endisset

    @isset($pagination)
        <x-slot:pagination>{{ $pagination }}</x-slot:pagination>
    @endisset
</x-sampaui::table>
