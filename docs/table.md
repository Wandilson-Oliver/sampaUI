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

Props principais: `columns`, `rows`, `empty`, `striped`, `hover`, `bordered`, `compact`.

