# Alert

Mensagem contextual no fluxo da pagina.

## Uso

```blade
<x-sampaui::alert variant="success" title="Lead atualizado">
    As alteracoes foram sincronizadas.
</x-sampaui::alert>
```

## Propriedades

- `variant`: `success`, `danger`/`error`, `warning` ou `info`
- `type`: alias opcional de `variant`
- `title`
- `icon`
- `role`

## Exemplos

```blade
<x-sampaui::alert variant="success" title="Salvo">Alteracoes publicadas.</x-sampaui::alert>
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Pode ser exibido condicionalmente por estado Livewire.
