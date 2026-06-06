# Checkbox

Campo booleano com label e suporte a Livewire.

Para um booleano Livewire, `wire:model` e suficiente; a prop `value` so e necessaria em grupos que precisam enviar valores especificos.

O controle usa `border-secondary/40` como borda padrao.

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
- `color`: `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted`, `light`
- `error`
- `disabled`
