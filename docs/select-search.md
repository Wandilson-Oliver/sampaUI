# Select Search

Select pesquisavel com busca local em Alpine e valor real em input hidden.

Use para listas medias carregadas no HTML. Para milhares de registros ou busca remota, prefira criar uma integracao Livewire especifica.

O trigger e o campo de busca interno usam `border-secondary/20`, seguindo a mesma linguagem visual do `input` e do `select`.

```blade
<x-sampaui::select-search
    name="owner"
    label="Responsavel"
    placeholder="Selecione um responsavel"
    search-placeholder="Buscar por nome"
    :options="[
        'ana' => 'Ana Souza',
        'bruno' => 'Bruno Lima',
        'carla' => 'Carla Martins',
    ]"
/>
```

Com valor inicial:

```blade
<x-sampaui::select-search
    name="city"
    label="Cidade"
    value="campinas"
    :options="[
        ['value' => 'sp', 'label' => 'Sao Paulo'],
        ['value' => 'campinas', 'label' => 'Campinas'],
    ]"
/>
```

Com Livewire:

```blade
<x-sampaui::select-search
    name="customer_id"
    label="Cliente"
    wire:model.live="customerId"
    :options="$customers"
/>
```

O componente usa `x-modelable` para receber o valor inicial e manter sincronizacao bidirecional. Nao passe `value` junto com `wire:model`.
Erros do validator sao exibidos automaticamente usando `name` ou o caminho de `wire:model`.

O componente tambem dispara `select-search:changed` com `id`, `name`, `value` e `label`.
