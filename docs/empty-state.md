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

## Props

- `icon`: Bootstrap Icon.
- `title`: titulo curto.
- `description`: texto auxiliar opcional.

