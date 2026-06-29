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
