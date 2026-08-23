# Radio

Grupo de opcoes exclusivas com suporte a arrays, slot manual, cores oficiais, erro e Livewire.

Com Livewire, nao informe a prop `value` do componente: `wire:model` seleciona automaticamente a opcao correspondente ao estado.

Cada opcao usa `border-secondary/40` como borda padrao.

```blade
<x-sampaui::radio
    name="priority"
    label="Prioridade"
    color="accent"
    wire:model.live="priority"
    inline
    :options="[
        'low' => 'Baixa',
        'medium' => 'Media',
        'high' => 'Alta',
    ]"
/>
```

Props principais: `label`, `name`, `value`, `options`, `color`, `inline`, `error`, `disabled`. A prop `value` permanece disponivel apenas para selecao inicial fora do Livewire.

`color` aceita os tokens oficiais: `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted` e `light`.

## Uso

Use `<x-sampaui::radio />` como ponto de partida e adapte apenas o layout com `class=""`.

## Propriedades

- `name`: propriedade pública do componente.
- `label`: propriedade pública do componente.
- `value`: propriedade pública do componente.
- `options`: propriedade pública do componente.
- `inline`: propriedade pública do componente.
- `error`: propriedade pública do componente.
- `disabled`: propriedade pública do componente.
- `color`: propriedade pública do componente.
- `variant`: `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted`.

## Exemplos

```blade
<x-sampaui::radio name="status" :options="['active' => 'Ativo']" wire:model="status" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Use wire:model para vincular a opcao selecionada.
