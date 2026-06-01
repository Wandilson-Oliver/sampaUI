# Breadcrumb

Use para mostrar o caminho da pagina atual.

```blade
<x-sampaui::breadcrumb
    :items="[
        ['label' => 'Dashboard', 'href' => '/dashboard'],
        ['label' => 'Imoveis'],
    ]"
/>
```

## Contrato

- `items`: array de strings ou arrays com `label` e `href`.
- O ultimo item recebe `aria-current="page"`.
- O `nav` define `aria-label="Breadcrumb"`.

