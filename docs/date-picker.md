# DatePicker

Calendario de data apenas, sem hora. O componente usa Alpine para exibir o calendario e envia somente uma string `YYYY-MM-DD` no input real.

O trigger usa texto neutro `text-slate-600`, com icone e valor herdando a mesma cor. Estados de data selecionada e desabilitada mantem contraste proprio no calendario.

```blade
<x-sampaui::date-picker
    name="scheduled_at"
    label="Data do agendamento"
    min="2026-05-01"
    max="2026-12-31"
    clearable
    wire:model.live="scheduledAt"
/>
```

Props principais: `label`, `name`, `value`, `min`, `max`, `placeholder`, `error`, `disabled`, `required`, `clearable`.

Com Livewire, `wire:model` inicializa e sincroniza a data por `x-modelable`; nao e necessario informar `value`.

O calendario abre em um portal no `body`, com `position: fixed`, largura minima de `20rem` e reposicionamento em scroll e resize. Assim, ele permanece visivel dentro de `Modal`, `Drawer`, `Card` e outros containers com `overflow`.

Use `class=""` para substituir o visual do trigger, incluindo cor, fundo, espacamento, largura, raio e sombra:

```blade
<x-sampaui::date-picker
    name="reviewed_at"
    label="Data de revisao"
    class="bg-slate-50 text-emerald-600 shadow-none"
/>
```
