# Stepper

Use para fluxos sequenciais.

```blade
<x-sampaui::stepper
    :current="2"
    :steps="['Dados', 'Midia', 'Publicacao']"
/>
```

## Props

- `steps`: array de etapas.
- `current`: indice atual baseado em `1`.

Etapas completas, atual e futuras recebem estilos diferentes com a paleta oficial.

