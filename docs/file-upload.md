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
- `preview`: mostra previews locais quando possivel e permite remover imagens antes de salvar.
- `error`, `disabled`, `required`.

O input real preserva atributos Livewire e HTML. Ao remover um item do preview, o componente tambem atualiza o `FileList` do input e dispara eventos para sincronizar formularios e Livewire.

Para uploads Livewire, use somente `wire:model`; nao informe `value`, pois inputs de arquivo nao aceitam valor inicial.
