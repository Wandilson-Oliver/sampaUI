# Dropdown

Use para menus de acoes, filtros e seletores compactos.

```blade
<x-sampaui::dropdown label="Acoes" icon="three-dots">
    <x-sampaui::dropdown-item icon="pencil" href="/edit">Editar</x-sampaui::dropdown-item>
    <x-sampaui::dropdown-item icon="trash" type="button">Remover</x-sampaui::dropdown-item>
</x-sampaui::dropdown>
```

## Props

- `label`: texto do trigger.
- `icon`: Bootstrap Icon opcional.
- `align`: `left` ou `right`.
- `width`: largura do menu.

## Subcomponente

`x-sampaui::dropdown-item` e parte do dropdown. Ele aceita `href`, `type`, `icon`, `disabled` e preserva atributos Livewire como `wire:click`.

