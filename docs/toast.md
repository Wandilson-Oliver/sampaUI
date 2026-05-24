# Toast

Central de notificacoes temporarias baseada em Alpine.

Inclua uma vez no layout:

```blade
<x-sampaui::toast />
```

Dispare um evento browser:

```js
window.dispatchEvent(new CustomEvent('toast', {
    detail: { type: 'success', title: 'Salvo', message: 'Alteracoes publicadas.' }
}))
```

## Props

- `position`: `top-right`, `top-left`, `bottom-right` ou `bottom-left`
- `max`
