# Toast

Central de notificacoes temporarias baseada em Alpine.

Inclua uma vez no layout:

```blade
<x-sampaui::toast />
```

Adicione um botao para abrir o toast:

```blade
<x-sampaui::button
    icon="bell"
    onclick="window.dispatchEvent(new CustomEvent('toast', { detail: { type: 'success', title: 'Salvo', message: 'Alteracoes publicadas.' } }))"
>
    Abrir toast
</x-sampaui::button>
```

Ou dispare o mesmo evento browser via JavaScript:

```js
window.dispatchEvent(new CustomEvent('toast', {
    detail: { type: 'success', title: 'Salvo', message: 'Alteracoes publicadas.' }
}))
```

## Props

- `position`: `top-right`, `top-left`, `bottom-right` ou `bottom-left`
- `max`
