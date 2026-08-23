# Table Search

Use `table-search` quando a listagem precisar de pesquisa. O componente compoe o `table` oficial e ativa a busca sem duplicar o markup da tabela.

```blade
<x-sampaui::table-search
    title="Clientes"
    description="Contas ativas"
    search-model="search"
    :columns="[
        'name' => 'Nome',
        'email' => 'Email',
        'status' => 'Status',
    ]"
    :rows="$customers"
/>
```

Para pesquisa local, passe `search`. Para consultas Livewire, use `search-model`; o campo aplica `wire:model.live.debounce.300ms`.

## Campos de pesquisa personalizados

Use o slot `filters` para substituir o campo padrão por qualquer combinação de componentes SampaUI:

```blade
<x-sampaui::table-search
    :columns="$columns"
    :rows="$customers"
    per-page="15"
    :page="$page"
    :total="$total"
>
    <x-slot:filters>
        <x-sampaui::select
            name="status"
            wire:model.live="filters.status"
            :options="['all' => 'Todos', 'active' => 'Ativos']"
        />

        <x-sampaui::input
            type="search"
            name="customer-search"
            icon="search"
            placeholder="Buscar cliente ou email"
            wire:model.live.debounce.300ms="filters.search"
        />
    </x-slot:filters>
</x-sampaui::table-search>
```

Inputs e selects usam altura mínima de `3rem` para permanecer alinhados na toolbar.

## Paginação

Altere o visual com `pagination-type="simple"`, `pagination-type="numbers"` ou `pagination-type="compact"`. O slot `pagination` continua disponível para uma implementação totalmente personalizada.

```blade
<x-sampaui::table-search
    search-model="search"
    per-page="15"
    :page="$page"
    :total="$total"
    pagination-method="gotoPage"
    pagination-type="numbers"
    selectable
    :columns="$columns"
    :rows="$rows"
/>
```

`table-search` usa `flush`, `bleed` e `bordered="false"` por padrão. Dentro de um `Card`, ele compensa automaticamente o padding lateral e encosta a listagem nas duas bordas. Fora do card, a compensação é zero. Use `:bleed="false"` para respeitar o padding do container ou `:flush="false" bordered` para renderizá-lo como superfície independente.

Use `<x-sampaui::table>` para listagens simples sem campo de pesquisa. As props avançadas antigas continuam aceitas pelo `table` para preservar compatibilidade.

## Uso

Use `<x-sampaui::table-search />` como ponto de partida e adapte apenas o layout com `class=""`.

## Propriedades

- `columns`: propriedade pública do componente.
- `rows`: propriedade pública do componente.
- `title`: propriedade pública do componente.
- `description`: propriedade pública do componente.
- `empty`: propriedade pública do componente.
- `empty-title`: propriedade pública do componente.
- `empty-description`: propriedade pública do componente.
- `empty-icon`: propriedade pública do componente.
- `striped`: propriedade pública do componente.
- `hover`: propriedade pública do componente.
- `sort-by`: propriedade pública do componente.
- `sort-direction`: propriedade pública do componente.
- `sort-method`: propriedade pública do componente.
- `search`: propriedade pública do componente.
- `search-name`: propriedade pública do componente.
- `search-model`: propriedade pública do componente.
- `search-placeholder`: propriedade pública do componente.
- `per-page`: propriedade pública do componente.
- `page`: propriedade pública do componente.
- `total`: propriedade pública do componente.
- `pagination-method`: propriedade pública do componente.
- `pagination-type`: propriedade pública do componente.
- `selectable`: propriedade pública do componente.
- `selected-rows`: propriedade pública do componente.
- `select-name`: propriedade pública do componente.
- `row-key`: propriedade pública do componente.
- `export-href`: propriedade pública do componente.
- `export-label`: propriedade pública do componente.
- `sticky-header`: propriedade pública do componente.
- `mobile-cards`: propriedade pública do componente.
- `compact`: propriedade pública do componente.
- `bordered`: propriedade pública do componente.
- `flush`: propriedade pública do componente.
- `bleed`: propriedade pública do componente.
- `loading`: propriedade pública do componente.
- `loading-target`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::table-search title="Clientes" search-model="search" :columns="$columns" :rows="$rows" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Pesquisa, paginacao, selecao e ordenacao podem vir de propriedades e metodos Livewire.
