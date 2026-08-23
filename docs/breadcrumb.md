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

## Uso

Use `<x-sampaui::breadcrumb />` como ponto de partida e adapte apenas o layout com `class=""`.

## Propriedades

- `items`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::breadcrumb :items="$items" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Links podem usar wire:navigate nos itens.
