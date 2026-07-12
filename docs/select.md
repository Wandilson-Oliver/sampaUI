# Select

O painel e renderizado por teleport no `body`, acompanha o trigger em scroll/resize e abre acima quando nao houver espaco abaixo. Isso permite uso dentro de Modal, Drawer e containers com `overflow-hidden` sem recorte.

Campo de selecao com combobox Alpine, dropdown customizado e `<select>` real oculto para formularios e Livewire.

O trigger usa a mesma linguagem visual do `input`: `border-secondary/20`, `rounded-default`, `focus:border-primary`, `focus:ring-primary/20`, hover suave, estados de erro/loading/disabled e suporte a `readonly`.

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
    label="Status"
    wire:model.live="status"
    required
    :options="$statuses"
/>
```

O `wire:model` fica no container `x-modelable`. Assim, selecao do usuario, valor inicial e atualizacoes posteriores do servidor mantem o valor nativo e o label visivel sincronizados. Erros do validator usam automaticamente o caminho do model quando `name` nao foi informado.

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

O trigger suporta setas, Home, End, Enter, Espaco e Esc, com opcao ativa anunciada por `aria-activedescendant`. Use `clearable`, `hint`, `readonly`, `loading`, `loading-target`, `state`, `prefix` e `suffix`. O `<select>` real permanece oculto para formularios e acessibilidade.
