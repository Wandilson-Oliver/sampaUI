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

```blade
<x-sampaui::table-search
    search-model="search"
    per-page="15"
    :page="$page"
    :total="$total"
    pagination-method="gotoPage"
    selectable
    :columns="$columns"
    :rows="$rows"
/>
```

Use `<x-sampaui::table>` para listagens simples sem campo de pesquisa. As props avançadas antigas continuam aceitas pelo `table` para preservar compatibilidade.
