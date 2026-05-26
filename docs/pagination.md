# Pagination

Paginacao para Laravel paginator ou valores manuais, com suporte a Livewire via `wire-method`.

```blade
<x-sampaui::pagination
    :current-page="2"
    :last-page="8"
    :total="80"
    :per-page="10"
    previous-url="/clientes?page=1"
    next-url="/clientes?page=3"
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

