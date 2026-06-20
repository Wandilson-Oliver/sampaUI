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

Toasts excedentes entram em fila e o limite controla apenas os visiveis. O timer pausa com mouse ou foco. Erros usam `aria-live="assertive"`; demais tipos usam `polite`. `variant` aceita `soft`, `solid` e `outline`, e `size` aceita `sm`, `md` e `lg`.

Dispare `toast` ou o alias namespaced `sampaui:toast` no `window`; ambos recebem o mesmo payload em `event.detail`.
