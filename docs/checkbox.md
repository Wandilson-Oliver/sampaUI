# Checkbox

Campo booleano com label e suporte a Livewire.

Para um booleano Livewire, `wire:model` e suficiente; a prop `value` so e necessaria em grupos que precisam enviar valores especificos.
Em grupos, o id de cada controle combina `wire:model`/`name` com `value`, evitando labels associados ao item errado.

O controle usa `border-secondary/40` como borda padrao.

## Uso

```blade
<x-sampaui::checkbox
    label="Aceito os termos"
    color="accent"
    wire:model="terms"
/>
```

```blade
<x-sampaui::checkbox label="Administrador" value="admin" wire:model="roles" />
<x-sampaui::checkbox label="Editor" value="editor" wire:model="roles" />
```

## Props

- `label`
- `name`
- `value`
- `checked`
- `color`: `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted`, `light`
- `error`
- `disabled`

Tambem aceita `hint`, `required`, `readonly`, `loading`, `loading-target` e `state` (`error`, `success`, `warning`). O input recebe `aria-invalid` e `aria-describedby` automaticamente.
