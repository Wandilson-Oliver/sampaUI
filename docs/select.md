# Select

Campo de selecao com slot para options.

O componente remove a aparencia nativa do navegador e usa um chevron Bootstrap Icons para manter o mesmo acabamento visual do `Input`.

## Uso

```blade
<x-sampaui::select name="status" label="Status" placeholder="Selecione">
    <option value="active">Ativo</option>
    <option value="inactive">Inativo</option>
</x-sampaui::select>
```

Com Livewire, `wire:model` controla a opcao selecionada sem precisar adicionar `selected` ou uma prop `value`:

```blade
<x-sampaui::select name="status" label="Status" wire:model.live="status">
    <option value="active">Ativo</option>
    <option value="inactive">Inativo</option>
</x-sampaui::select>
```

## Props

- `label`
- `name`
- `placeholder`
- `error`
- `disabled`
