# Select Search

O painel usa teleport para `body`, calcula posicao no viewport e devolve foco ao campo de busca ao abrir. Pode ser usado em Modal e Drawer sem ser cortado pelo scroll interno.

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

## Uso

Use `<x-sampaui::select-search />` como ponto de partida e adapte apenas o layout com `class=""`.

## Propriedades

- `name`: propriedade pública do componente.
- `label`: propriedade pública do componente.
- `placeholder`: propriedade pública do componente.
- `options`: propriedade pública do componente.
- `value`: propriedade pública do componente.
- `search-placeholder`: propriedade pública do componente.
- `empty-text`: propriedade pública do componente.
- `disabled`: propriedade pública do componente.
- `error`: propriedade pública do componente.
- `required`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::select-search name="owner" label="Responsavel" :options="$owners" wire:model.live="owner" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Usa x-modelable e preserva wire:model para busca local.
