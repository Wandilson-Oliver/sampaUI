# Dropdown

Menu de acoes com trigger customizavel, alinhamento e portal fixo que evita recorte em Cards, Modals, Drawers e areas rolaveis.

Menu de acoes com trigger customizavel, alinhamento e portal fixo que evita recorte em Cards, Modals, Drawers e areas rolaveis. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::dropdown align="right" placement="top"><x-slot:trigger>Menu</x-slot:trigger>Conteudo</x-sampaui::dropdown>
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `label` | `string|null` | `null` | Rótulo textual exibido acima ou ao lado do componente. |
| `icon` | `string|null` | `null` | Nome do ícone Bootstrap Icons (sem o prefixo bi-). |
| `align` | `left|right|center` | `left` | Alinhamento horizontal em relação ao botão trigger. |
| `placement` | `string` | `right` | Posição de ancoragem ou direção de abertura do painel/menu. |
| `width` | `string` | `auto` | Largura do menu flutuante. |
| `close-on-escape` | `bool` | `true` | Fecha o overlay ao pressionar a tecla Escape. |
| `close-on-outside` | `bool` | `true` | Fecha o overlay ao clicar fora da área principal. |

## Slots

- `trigger`
- `default`

## Exemplos

```blade
<x-sampaui::dropdown align="right" placement="top"><x-slot:trigger>Menu</x-slot:trigger>Conteudo</x-sampaui::dropdown>
```

## Boas práticas

- Itens internos podem usar wire:click ou wire:navigate; o menu usa portal fixo para nao ser recortado por overlays e areas rolaveis.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
