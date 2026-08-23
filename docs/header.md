# Header

Cabecalho de pagina com titulo, subtitulo, status, acoes e botao mobile para navegacao.

Use no topo de dashboards e telas internas. O componente organiza contexto e comandos principais; em desktop, a area de acoes usa largura automatica estrutural para nunca reduzir o titulo a zero.

## Uso

```blade
<x-sampaui::header title="Clientes"><x-slot:actions>Acoes</x-slot:actions></x-sampaui::header>
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `title` | `string` | `Dashboard` | Titulo principal exibido no header. |
| `subtitle` | `string|null` | `null` | Texto auxiliar abaixo do titulo. |
| `eyebrow` | `string|null` | `null` | Label curto acima do titulo. |
| `status` | `string|null` | `null` | Pill de status exibida na direita. |
| `menu` | `bool` | `false` | Exibe botao mobile para abrir navegacao. |
| `menu-event` | `string` | `sampaui:sidebar-open` | Evento Alpine disparado pelo botao mobile. |
| `aria-label` | `string` | `Container` | Rótulo de acessibilidade para leitores de tela. |
| `search` | `bool` | `false` | Exibe o campo de busca responsivo no centro do header. |
| `search-name` | `string` | `header_search` | Nome do input de busca. |
| `search-model` | `string|null` | `null` | Aplica `wire:model.live.debounce.300ms` quando informado. |
| `search-placeholder` | `string` | `Buscar...` | Placeholder do campo de busca. |
| `notifications` | `bool` | `false` | Exibe o botao de notificacoes. |
| `notification-count` | `int` | `0` | Badge numerico limitado visualmente a `99+`. |
| `notification-event` | `string` | `sampaui:notifications-open` | Evento disparado pelo botao de notificacoes. |
| `sticky` | `bool` | `false` | Mantem o header no topo durante a rolagem. |

## Slots

- `left`
- `center`
- `right`
- `actions`

## Exemplos

```blade
<x-sampaui::header title="Clientes"><x-slot:actions>Acoes</x-slot:actions></x-sampaui::header>
```

## Boas práticas

- Acoes internas podem chamar metodos Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
