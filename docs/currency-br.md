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

## Propriedades

- `label`
- `name`
- `placeholder`
- `symbol`: texto exibido no prefixo quando o slot `prefix` nao e informado
- `icon`: nome Bootstrap Icons sem o prefixo `bi-`

## Slots

- `prefix`
- `suffix`

## Exemplos

```blade
<x-sampaui::currency-br name="price" label="Valor" wire:model.live="price" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Formata valores no padrao brasileiro e sincroniza o model Alpine/Livewire.
