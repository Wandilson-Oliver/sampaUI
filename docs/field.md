# Field

Wrapper estrutural para padronizar label, indicador obrigatorio, hint e erro acessivel.

```blade
<x-sampaui::field id="email" label="Email" hint="Use seu email profissional" required>
    <input id="email" name="email" wire:model="email">
</x-sampaui::field>
```

Use `label-for` quando o elemento rotulado possuir outro id. Os componentes de formulario do SampaUI ja usam este wrapper internamente; em usos manuais, mantenha `wire:model`, `aria-invalid` e `aria-describedby` no controle real.
