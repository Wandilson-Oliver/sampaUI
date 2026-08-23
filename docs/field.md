# Field

Wrapper estrutural para padronizar label, indicador obrigatorio, hint e erro acessivel.

```blade
<x-sampaui::field id="email" label="Email" hint="Use seu email profissional" required>
    <input id="email" name="email" wire:model="email">
</x-sampaui::field>
```

Use `label-for` quando o elemento rotulado possuir outro id. Os componentes de formulario do SampaUI ja usam este wrapper internamente; em usos manuais, mantenha `wire:model`, `aria-invalid` e `aria-describedby` no controle real.

## Uso

Use `<x-sampaui::field />` como ponto de partida e adapte apenas o layout com `class=""`.

## Propriedades

- `id`: propriedade pública do componente.
- `label-for`: propriedade pública do componente.
- `label`: propriedade pública do componente.
- `hint`: propriedade pública do componente.
- `error`: propriedade pública do componente.
- `required`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::field id="email" label="Email" hint="Use seu email profissional"><input id="email" /></x-sampaui::field>
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Wrapper estrutural; mantenha wire:model no controle real dentro do slot.
