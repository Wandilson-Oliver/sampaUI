# Radio

Grupo de opcoes exclusivas com suporte a arrays, slot manual, cores oficiais, erro e Livewire.

```blade
<x-sampaui::radio
    name="priority"
    label="Prioridade"
    color="accent"
    value="medium"
    inline
    :options="[
        'low' => 'Baixa',
        'medium' => 'Media',
        'high' => 'Alta',
    ]"
/>
```

Props principais: `label`, `name`, `value`, `options`, `color`, `inline`, `error`, `disabled`.

