# DatePicker

Calendario de data apenas, sem hora. O componente usa Alpine para exibir o calendario e envia somente uma string `YYYY-MM-DD` no input real.

O trigger do campo usa `border-secondary/40`, seguindo os demais componentes de formulario.

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
