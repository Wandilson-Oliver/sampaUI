# Radio

Grupo de opcoes exclusivas com suporte a arrays, slot manual, cores oficiais, erro e Livewire.

Com Livewire, nao informe a prop `value` do componente: `wire:model` seleciona automaticamente a opcao correspondente ao estado.

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
