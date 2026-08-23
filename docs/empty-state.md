# Empty State

Use quando uma lista, tabela ou busca nao possui dados.

```blade
<x-sampaui::empty-state
    icon="inbox"
    title="Sem imoveis"
    description="Cadastre o primeiro imovel para iniciar a carteira."
>
    <x-sampaui::button icon="plus">Novo imovel</x-sampaui::button>
</x-sampaui::empty-state>
```

## Propriedades

- `icon`: Bootstrap Icon.
- `title`: titulo curto.
- `description`: texto auxiliar opcional.

## Uso

Use `<x-sampaui::empty-state />` como ponto de partida e adapte apenas o layout com `class=""`.

## Exemplos

```blade
<x-sampaui::empty-state title="Nada encontrado" icon="inbox" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Use em estados condicionais de listas Livewire.
