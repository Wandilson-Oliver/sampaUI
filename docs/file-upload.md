# File Upload

Use para anexos, contratos, imagens e midias.

A area de selecao usa borda tracejada `border-secondary/50` por padrao.

```blade
<x-sampaui::file-upload
    name="photos[]"
    label="Fotos"
    accept="image/*"
    multiple
    preview
    wire:model="photos"
/>
```

## Props

- `name`, `label`, `accept`.
- `multiple`: permite varios arquivos.
- `preview`: mostra previews locais quando possivel.
- `error`, `disabled`, `required`.

O input real preserva atributos Livewire e HTML.

Para uploads Livewire, use somente `wire:model`; nao informe `value`, pois inputs de arquivo nao aceitam valor inicial.
