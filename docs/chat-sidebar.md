# Chat Sidebar

Painel lateral com busca, contadores de mensagens não lidas, status de presença e lista de conversas.

Permite renderizar listas ricas de contatos passando um array em :conversations ou compondo itens customizados no slot padrão. Suporta pesquisa reativa com wire:model ou x-model, badges de não lidas e indicador de digitação.

## Uso

```blade
<x-sampaui::chat-sidebar :conversations="$conversations" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `title` | `string` | `Conversas` | Título principal do cabeçalho da sidebar. |
| `subtitle` | `string|null` | `null` | Subtítulo ou resumo de contatos ativos. |
| `conversations` | `array` | `[]` | Array de conversas com id, name, preview, time, unread, avatar, status, typing, tag e wireClick. |
| `search-placeholder` | `string` | `Buscar conversa` | Placeholder da barra de pesquisa. |
| `search-name` | `string` | `chat_search` | Atributo name do campo de busca. |
| `searchable` | `bool` | `true` | Controla se a barra de pesquisa é renderizada. |
| `empty-title` | `string` | `Nenhuma conversa` | Título exibido quando a lista está vazia. |
| `empty-description` | `string` | `As conversas recentes aparecerão aqui.` | Mensagem explicativa do empty state. |

## Slots

- `default`
- `actions`

## Exemplos

```blade
<x-sampaui::chat-sidebar :conversations="$conversations" />
```

## Boas práticas

- A lista de conversas pode vir de propriedades computadas e filtros Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
