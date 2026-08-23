# Dropdown

Use para menus de acoes, filtros e seletores compactos.

```blade
<x-sampaui::dropdown label="Acoes" icon="three-dots">
    <x-sampaui::dropdown-item icon="pencil" href="/edit">Editar</x-sampaui::dropdown-item>
    <x-sampaui::dropdown-item icon="trash" type="button">Remover</x-sampaui::dropdown-item>
</x-sampaui::dropdown>

<x-sampaui::dropdown label="Acoes" icon="three-dots" align="right" placement="top">
    <x-sampaui::dropdown-item icon="eye">Visualizar</x-sampaui::dropdown-item>
    <x-sampaui::dropdown-item icon="pencil">Editar</x-sampaui::dropdown-item>
</x-sampaui::dropdown>
```

## Propriedades

- `label`: texto do trigger.
- `icon`: Bootstrap Icon opcional.
- `align`: `left` ou `right`.
- `placement`: `bottom` ou `top`. O menu abre acima automaticamente quando faltar espaco abaixo; use `top` para preferir essa direcao.
- `width`: largura do menu.

## Subcomponente

`x-sampaui::dropdown-item` e parte do dropdown. Ele aceita `href`, `type`, `icon`, `disabled` e preserva atributos Livewire como `wire:click`.

O menu e teletransportado para o `body` e posicionado com `position: fixed`, portanto nao e recortado por Card, Modal, Drawer ou areas rolaveis. Ele acompanha o trigger em scroll e resize, move o foco ao abrir, suporta setas, Home e Esc e devolve o foco ao trigger. Use `close-on-escape` e `close-on-outside` para configurar o fechamento.

## Uso

Use `<x-sampaui::dropdown />` como ponto de partida e adapte apenas o layout com `class=""`.

## Exemplos

```blade
<x-sampaui::dropdown align="right" placement="top"><x-slot:trigger>Menu</x-slot:trigger>Conteudo</x-sampaui::dropdown>
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Itens internos podem usar wire:click ou wire:navigate; o menu usa portal fixo para nao ser recortado por overlays e areas rolaveis.
