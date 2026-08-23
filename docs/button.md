# Button

Botao principal do SampaUI.

## Uso

```blade
<x-sampaui::button>
    Salvar
</x-sampaui::button>
```

## Propriedades

- `variant`: `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted`, `outline`, `ghost`, `light`
- `size`: `sm`, `md`, `lg`, `xl`, `2xl`
- `icon`: nome do Bootstrap Icon sem o prefixo `bi-`
- `icon-position`: `left` ou `right`
- `rounded`, `loading`, `disabled`, `full`
- `href`: quando informado, renderiza um link `<a>` com o visual de botao

## Exemplos

```blade
<x-sampaui::button variant="outline" icon="plus">
    Adicionar
</x-sampaui::button>

<x-sampaui::button icon="trash" rounded />

<x-sampaui::button loading>
    Salvando
</x-sampaui::button>

<x-sampaui::button href="/clientes" wire:navigate icon="arrow-right">
    Ver clientes
</x-sampaui::button>

<x-sampaui::button class="bg-danger text-white px-8 py-4 rounded-full shadow-none">
    Excluir cliente
</x-sampaui::button>
```

## Customizacao

`class=""` substitui os utilitarios visuais conflitantes do Button. Cores, hover, espacamento, largura, raio, sombra e tipografia podem ser ajustados normalmente, sem `!important`. O estado `disabled` preserva `cursor-not-allowed` e opacidade reduzida.

## Propriedades adicionais

- `type`: propriedade pública do componente.

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Preserva wire:click, wire:navigate e demais atributos no elemento interativo real; class substitui defaults visuais conflitantes.
