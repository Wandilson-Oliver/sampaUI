# Button

Botao principal do SampaUI.

## Uso

```blade
<x-sampaui::button>
    Salvar
</x-sampaui::button>
```

## Props

- `variant`: `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted`, `outline`, `ghost`, `light`
- `size`: `sm`, `md`, `lg`, `xl`, `2xl`
- `icon`: nome do Bootstrap Icon sem o prefixo `bi-`
- `icon-position`: `left` ou `right`
- `rounded`, `loading`, `disabled`, `full`
- `href`: quando informado, renderiza um link `<a>` com o visual de botao

## Exemplos

```blade
<x-sampaui::button variant="outline" icon="plus">
    Adicionar
</x-sampaui::button>

<x-sampaui::button icon="trash" rounded />

<x-sampaui::button loading>
    Salvando
</x-sampaui::button>

<x-sampaui::button href="/clientes" wire:navigate icon="arrow-right">
    Ver clientes
</x-sampaui::button>
```
