# Toggle

Use para estados booleanos.

O estado e lido diretamente de `wire:model`, sem necessidade de `checked` ou `value`.

```blade
<x-sampaui::toggle
    name="featured"
    label="Destacar na home"
    color="accent"
    wire:model.live="featured"
/>
```

## Props

- `name`, `label`, `checked`, `disabled`, `error`.
- `color`: tokens da paleta oficial.

O input real preserva `wire:model`, `required` e atributos HTML.
