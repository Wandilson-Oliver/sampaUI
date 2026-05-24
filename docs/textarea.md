# Textarea

Campo de texto longo.

Por padrao, renderiza um `<textarea>` nativo. Para Markdown com toolbar simples, use `editor`, que inicializa EasyMDE via `dist/sampaui.js`.

## Uso

```blade
<x-sampaui::textarea
    name="description"
    label="Descricao"
    rows="6"
    wire:model.live="description"
/>
```

## Com editor

```blade
<x-sampaui::textarea
    name="description"
    label="Descricao"
    editor
    editor-min-height="240px"
/>
```

## Props

- `label`
- `name`
- `rows`
- `placeholder`
- `editor`: `false`, `true`, `easymde` ou `markdown`
- `editor-min-height`
- `error`
- `disabled`
