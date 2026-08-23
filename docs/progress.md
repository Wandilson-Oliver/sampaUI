# Progress

Use para progresso, score e acompanhamento de qualidade.

```blade
<x-sampaui::progress
    label="Carteira revisada"
    :value="84"
    show-value
    variant="success"
/>
```

## Propriedades

- `value`: valor atual.
- `max`: valor maximo, padrao `100`.
- `label`: texto opcional.
- `show-value`: mostra percentual calculado.
- `variant`: `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted`, `light`.

O track usa `role="progressbar"` com `aria-valuenow`, `aria-valuemin` e `aria-valuemax`.

## Uso

Use `<x-sampaui::progress />` como ponto de partida e adapte apenas o layout com `class=""`.

## Exemplos

```blade
<x-sampaui::progress value="60" variant="primary" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Valor pode ser atualizado por propriedades Livewire.
