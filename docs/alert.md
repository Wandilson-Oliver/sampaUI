# Alert

Mensagem contextual no fluxo da pagina.

## Uso

```blade
<x-sampaui::alert variant="success" title="Lead atualizado">
    As alteracoes foram sincronizadas.
</x-sampaui::alert>
```

## Props

- `variant`: `success`, `danger`/`error`, `warning` ou `info`
- `type`: alias opcional de `variant`
- `title`
- `icon`
- `role`
