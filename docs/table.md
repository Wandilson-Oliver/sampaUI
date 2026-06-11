# Table

Tabela responsiva para listagens simples. Pode renderizar automaticamente via `columns` e `rows` ou receber slots `head` e `body`.

```blade
<x-sampaui::table
    :columns="[
        'name' => 'Cliente',
        'status' => 'Status',
        'amount' => ['label' => 'Valor', 'key' => 'amount', 'align' => 'right'],
    ]"
    :rows="[
        ['name' => 'Ana Souza', 'status' => 'Ativo', 'amount' => 'R$ 1.200,00'],
    ]"
/>
```

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

Sem `sort-method`, o componente ordena os `rows` no servidor para exemplos estaticos.

Props principais: `columns`, `rows`, `empty`, `striped`, `hover`, `bordered`, `compact`, `sortBy`, `sortDirection`, `sortMethod`.
