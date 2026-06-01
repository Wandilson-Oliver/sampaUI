# Badge

Use para status curtos, prioridade, contadores e tags.

```blade
<x-sampaui::badge variant="success" icon="check2-circle">
    Publicado
</x-sampaui::badge>
```

## Props

- `variant`: `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted`, `light`.
- `size`: `sm`, `md`, `lg`.
- `icon`: nome Bootstrap Icons sem `bi-`.
- `rounded`: troca entre `rounded-full` e `rounded-default`.

Variantes invalidas retornam para `primary`.

