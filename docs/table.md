# Table

DataTable responsiva para CRMs, ERPs e dashboards internos. Pode renderizar automaticamente via `columns` e `rows` ou receber slots `head`, `body`, `toolbar`, `filters`, `actions` e `pagination`.

```blade
<x-sampaui::table
    title="Leads"
    description="Pipeline comercial"
    :columns="[
        'name' => 'Cliente',
        'status' => 'Status',
        'amount' => ['label' => 'Valor', 'key' => 'amount', 'align' => 'right'],
    ]"
    :rows="[
        ['id' => 1, 'name' => 'Ana Souza', 'status' => 'Ativo', 'amount' => 'R$ 1.200,00'],
    ]"
/>
```

## Busca, selecao e exportacao

```blade
<x-sampaui::table
    title="Leads imobiliarios"
    searchable
    search-model="search"
    selectable
    row-key="id"
    export-href="{{ route('leads.export') }}"
    :selected-rows="$selected"
    :columns="$columns"
    :rows="$leads"
/>
```

Sem `search-model`, a busca filtra `rows` localmente no render Blade. Com `search-model`, o input recebe `wire:model.live.debounce.300ms` e o filtro pode ser controlado pelo componente Livewire.

## Ordenacao

Marque apenas as colunas que podem ordenar:

```blade
<x-sampaui::table
    sort-by="name"
    sort-direction="asc"
    sort-method="sortBy"
    :columns="[
        'name' => ['label' => 'Cliente', 'sortable' => true],
        'status' => 'Status',
    ]"
    :rows="$users"
/>
```

Sem `sort-method`, o componente ordena os `rows` estaticamente para exemplos, previews e tabelas pequenas. Com `sort-method`, cada cabecalho usa `wire:click`.

## Paginacao

```blade
<x-sampaui::table
    searchable
    per-page="10"
    page="{{ $page }}"
    total="{{ $total }}"
    pagination-method="gotoTablePage"
    :columns="$columns"
    :rows="$rows"
/>
```

Quando `per-page` e usado sem `total`, a paginacao e calculada sobre `rows`. Quando `total` e maior que o numero de `rows`, o componente assume paginacao externa e apenas renderiza o resumo/controles.

## Estados

Use `loading` para renderizar skeletons leves e `empty-title`, `empty-description` e `empty-icon` para estados vazios mais claros.

Props principais: `columns`, `rows`, `title`, `description`, `empty`, `empty-title`, `empty-description`, `searchable`, `search`, `search-model`, `selectable`, `selected-rows`, `row-key`, `export-href`, `per-page`, `page`, `total`, `pagination-method`, `sortBy`, `sortDirection`, `sortMethod`.

`sticky-header` fixa o cabecalho dentro do container rolavel. `mobile-cards` transforma rows estruturadas em cards no mobile. `aria-sort` fica no cabecalho da coluna e a ordenacao Livewire bloqueia cliques repetidos durante loading.
