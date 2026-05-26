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
