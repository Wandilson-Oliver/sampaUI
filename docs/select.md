# Select

Campo de selecao com combobox Alpine, dropdown customizado e `<select>` real oculto para formularios e Livewire.

## Uso

```blade
<x-sampaui::select name="status" label="Status" placeholder="Selecione">
    <option value="active">Ativo</option>
    <option value="inactive">Inativo</option>
</x-sampaui::select>
```

Tambem aceita `options`:

```blade
<x-sampaui::select
    name="status"
    label="Status"
    placeholder="Selecione"
    :options="[
        'active' => 'Ativo',
        'inactive' => 'Inativo',
    ]"
/>
```

Com Livewire, `wire:model` sincroniza pelo `x-modelable` e atualiza o `<select>` real oculto:

```blade
<x-sampaui::select
    name="status"
    label="Status"
    wire:model.live="status"
    :options="$statuses"
/>
```

## Props

- `label`
- `name`
- `value`
- `options`
- `placeholder`
- `emptyText`
- `error`
- `disabled`
- `required`

O trigger suporta setas, Home, End, Enter, Espaco e Esc, com opcao ativa anunciada por `aria-activedescendant`. Use `clearable`, `hint`, `readonly`, `loading`, `loading-target`, `state`, `prefix` e `suffix`. `wire:model` permanece no `<select>` real.
