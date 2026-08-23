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

## Propriedades

- `name`, `label`, `checked`, `disabled`, `error`.
- `color`: tokens da paleta oficial (`primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted`, `light`).

O input real preserva `wire:model`, `required` e atributos HTML.

O controle usa `role="switch"` e aceita `hint`, `error`, `readonly`, `loading`, `loading-target` e estados visuais consistentes.

## Uso

Use `<x-sampaui::toggle />` como ponto de partida e adapte apenas o layout com `class=""`.

## Propriedades adicionais

- `state`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::toggle name="active" label="Ativo" color="accent" wire:model="active" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- wire:model fica no checkbox real.
