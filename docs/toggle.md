# Toggle

Use para estados booleanos.

O estado e lido diretamente de `wire:model`, sem necessidade de `checked` ou `value`.

Quando desligado, o trilho e o botao interno usam a cor definida em `color`. Quando ligado, o trilho recebe o fundo da mesma cor e o botao interno fica branco.

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
- `color`: tokens da paleta oficial (`primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted`, `light`).

O input real preserva `wire:model`, `required` e atributos HTML.
