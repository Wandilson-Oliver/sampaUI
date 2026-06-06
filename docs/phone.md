# Phone

Campo de telefone com mascara Alpine e base visual do componente `input`.

## Uso

```blade
<x-sampaui::phone
    name="phone"
    label="Telefone"
    wire:model.live="phone"
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
