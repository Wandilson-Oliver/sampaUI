# Currency BR

Campo monetario em reais com formatacao no padrao brasileiro e base visual do componente `input`.

## Uso

```blade
<x-sampaui::currency-br
    name="price"
    label="Valor"
    wire:model.live="price"
/>
```

## Props

- `label`
- `name`
- `placeholder`
- `symbol`: texto exibido no prefixo quando o slot `prefix` nao e informado
- `icon`: nome Bootstrap Icons sem o prefixo `bi-`

## Slots

- `prefix`
- `suffix`
