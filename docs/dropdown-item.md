# Dropdown Item

Subcomponente de `Dropdown`. Use apenas dentro de `x-sampaui::dropdown`.

```blade
<x-sampaui::dropdown-item icon="archive" wire:click="archive">
    Arquivar
</x-sampaui::dropdown-item>
```

## Contrato

- Renderiza `a` quando `href` e informado.
- Renderiza `button` quando nao houver `href`.
- Preserva atributos Livewire, Alpine e HTML.
- Usa `role="menuitem"` para acessibilidade.

## Uso

Use `<x-sampaui::dropdown-item />` como ponto de partida e adapte apenas o layout com `class=""`.

## Propriedades

- `href`: propriedade pública do componente.
- `icon`: propriedade pública do componente.
- `danger`: propriedade pública do componente.
- `disabled`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::dropdown-item icon="pencil" wire:click="edit">Editar</x-sampaui::dropdown-item>
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Preserva wire:click no item interativo.
