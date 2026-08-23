# Button

Acoes primarias, icones, estados de loading e largura total em um unico componente Blade.

Use para CTAs, acoes de formulario, navegacao e controles de fluxo. Quando recebe `href`, o componente renderiza um link com o mesmo visual do botao; `class` substitui utilitarios visuais conflitantes sem exigir `!important`.

## Uso

```blade
<x-sampaui::button variant="primary" icon="plus" wire:click="save">Salvar</x-sampaui::button>
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `variant` | `primary|secondary|accent|danger|success|warning|info|purple|muted|light|ghost|outline` | `primary` | Seleciona o conjunto visual do botao. Apenas `outline` usa borda. |
| `size` | `sm|md|lg|xl|2xl` | `md` | Controla padding, tipografia e dimensao dos botoes icon-only. |
| `icon` | `string|null` | `null` | Nome do Bootstrap Icon sem o prefixo `bi-`. |
| `icon-position` | `left|right` | `left` | Posiciona o icone antes ou depois do slot. |
| `href` | `string|null` | `null` | Quando informado, renderiza `<a>` e preserva atributos como `wire:navigate`. |
| `rounded` | `bool` | `false` | Troca o raio padrao por pill shape. |
| `loading` | `bool` | `false` | Desabilita o botao e ativa `aria-busy`. |
| `loading-target` | `string|bool|null` | `null` | Alvo de carregamento do Livewire. Aplica `wire:loading.attr="disabled"`, `wire:target`, `aria-busy` e spinner dinâmico. |
| `disabled` | `bool` | `false` | Aplica bloqueio de interacao sem spinner. |
| `full` | `bool` | `false` | Expande o botao para `w-full`. |
| `type` | `string` | `button` | Mantem compatibilidade com botoes submit/reset. |

## Slots

- `default`

## Exemplos

```blade
<x-sampaui::button variant="primary" icon="plus" wire:click="save">Salvar</x-sampaui::button>
```

## Boas práticas

- Preserva wire:click, wire:navigate e demais atributos no elemento interativo real; class substitui defaults visuais conflitantes.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
