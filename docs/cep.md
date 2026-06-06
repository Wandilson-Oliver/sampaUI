# CEP

Campo de CEP com mascara `99999-999`, `autocomplete="postal-code"` e base visual do componente `input`.

## Uso

```blade
<x-sampaui::cep
    name="postal_code"
    label="CEP"
    wire:model.live="postal_code"
/>
```

## Props

- `label`
- `name`
- `placeholder`
- `icon`: nome Bootstrap Icons sem o prefixo `bi-`

## Slots

- `prefix`
- `suffix`
