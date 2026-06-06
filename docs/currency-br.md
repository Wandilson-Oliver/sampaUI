# Currency BR

Campo monetario em reais com formatacao interna no padrao brasileiro e base visual do componente `input`.

O componente remove caracteres nao numericos, divide por 100 e sincroniza o valor formatado com Alpine/Livewire sem exigir plugin externo de mascara.

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
