# Checkbox

Campo booleano com label e suporte a Livewire.

## Uso

```blade
<x-sampaui::checkbox
    name="terms"
    label="Aceito os termos"
    color="accent"
    wire:model="terms"
/>
```

## Props

- `label`
- `name`
- `value`
- `checked`
- `color`: `primary`, `secondary`, `accent`, `danger`, `light`
- `error`
- `disabled`
