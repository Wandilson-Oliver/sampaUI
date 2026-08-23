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

## Propriedades

- `position`: `top-right`, `top-left`, `bottom-right` ou `bottom-left`
- `max`

Toasts excedentes entram em fila e o limite controla apenas os visiveis. O timer pausa com mouse ou foco. Erros usam `aria-live="assertive"`; demais tipos usam `polite`. `variant` aceita `soft`, `solid` e `outline`, e `size` aceita `sm`, `md` e `lg`.

Dispare `toast` ou o alias namespaced `sampaui:toast` no `window`; ambos recebem o mesmo payload em `event.detail`.

## Uso

Use `<x-sampaui::toast />` como ponto de partida e adapte apenas o layout com `class=""`.

## Propriedades adicionais

- `duration`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::toast />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Dispare CustomEvent("toast") pelo browser a partir de acoes Livewire.
