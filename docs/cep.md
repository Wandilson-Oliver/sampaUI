# CEP

Campo de CEP com mascara interna `99999-999`, `autocomplete="postal-code"` e base visual do componente `input`.

O componente remove caracteres nao numericos, limita o valor a 8 digitos e formata `12345678` como `12345-678`. Ele nao depende de plugin externo de mascara do Alpine.

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
