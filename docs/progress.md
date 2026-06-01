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

## Props

- `value`: valor atual.
- `max`: valor maximo, padrao `100`.
- `label`: texto opcional.
- `show-value`: mostra percentual calculado.
- `variant`: `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted`, `light`.

O track usa `role="progressbar"` com `aria-valuenow`, `aria-valuemin` e `aria-valuemax`.

