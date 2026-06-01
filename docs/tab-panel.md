# Tab Panel

Subcomponente de `Tabs`. Use apenas dentro de `x-sampaui::tabs`.

```blade
<x-sampaui::tab-panel name="details">
    Conteudo da aba.
</x-sampaui::tab-panel>
```

## Contrato

- `name`: mesma chave declarada em `tabs`.
- O painel aparece quando a aba ativa corresponde ao nome.
- O componente mantem o conteudo no DOM para preservar estado local simples.

