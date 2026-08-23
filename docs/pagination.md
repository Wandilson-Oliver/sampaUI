# Pagination

Paginacao Livewire-first para Laravel paginator ou valores manuais. Em telas Livewire, prefira `wire-method` apontando para o metodo de troca de pagina.

```blade
<x-sampaui::pagination
    :current-page="2"
    :last-page="8"
    :total="80"
    :per-page="10"
    wire-method="gotoPage"
/>
```

```blade
<x-sampaui::pagination
    :current-page="$page"
    :last-page="$lastPage"
    wire-method="gotoPage"
/>
```

Props principais: `paginator`, `currentPage`, `lastPage`, `total`, `perPage`, `previousUrl`, `nextUrl`, `window`, `wireMethod`, `simple`.

`compact` reduz os alvos visuais para contextos densos. Com `wire-method`, os botoes recebem estado loading/disabled direcionado ao metodo.

## Uso

Use `<x-sampaui::pagination />` como ponto de partida e adapte apenas o layout com `class=""`.

## Propriedades

- `paginator`: propriedade pública do componente.
- `current-page`: propriedade pública do componente.
- `last-page`: propriedade pública do componente.
- `total`: propriedade pública do componente.
- `per-page`: propriedade pública do componente.
- `previous-url`: propriedade pública do componente.
- `next-url`: propriedade pública do componente.
- `window`: propriedade pública do componente.
- `wire-method`: propriedade pública do componente.
- `simple`: propriedade pública do componente.
- `compact`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::pagination :current-page="1" :last-page="8" wire-method="gotoPage" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Pode chamar metodo Livewire definido em wire-method.
