# Chat Sidebar

Painel lateral com busca, contadores de mensagens não lidas, status de presença e lista de conversas.

```blade
<x-sampaui::chat-sidebar
    title="Atendimento"
    subtitle="12 conversas abertas"
    search-placeholder="Buscar contato ou empresa"
    :conversations="[
        [
            'id' => 1,
            'name' => 'Ana Souza',
            'preview' => 'Enviei os documentos da empresa.',
            'time' => '09:42',
            'status' => 'online',
            'unread' => 2,
            'tag' => 'Enterprise',
            'active' => true,
            'wireClick' => 'selectConversation(1)',
        ],
        [
            'id' => 2,
            'name' => 'Bruno Lima',
            'typing' => true,
            'time' => '08:15',
            'status' => 'online',
            'tag' => 'Suporte',
            'wireClick' => 'selectConversation(2)',
        ],
    ]"
>
    <x-slot:actions>
        <x-sampaui::button icon="plus" size="sm" rounded aria-label="Nova conversa" />
    </x-slot:actions>
</x-sampaui::chat-sidebar>
```

## Uso

Use `<x-sampaui::chat-sidebar />` como ponto de partida para listas de contatos com busca e indicadores de status. A lista pode vir de propriedades computadas e filtros Livewire.

## Propriedades

| Prop | Tipo | Padrão | Descrição |
| --- | --- | --- | --- |
| `title` | `string` | `'Conversas'` | Título principal no cabeçalho da sidebar. |
| `subtitle` | `string\|null` | `null` | Subtítulo ou resumo de conversas ativas. |
| `conversations` | `array` | `[]` | Array com objetos de conversa. |
| `search-placeholder` | `string` | `'Buscar conversa'` | Placeholder da caixa de pesquisa. |
| `search-name` | `string` | `'chat_search'` | Atributo name do campo de busca. |
| `searchable` | `bool` | `true` | Controla se a barra de pesquisa é renderizada. |
| `empty-title` | `string` | `'Nenhuma conversa'` | Título exibido no estado vazio. |
| `empty-description` | `string` | `'As conversas recentes aparecerão aqui.'` | Descrição do estado vazio. |

## Slots

- `actions`: Botões e ações do cabeçalho da sidebar (ex: nova conversa, filtros).
- `header`: Substitui o cabeçalho completo por uma estrutura personalizada.
- `footer`: Barra opcional fixada no rodapé da sidebar.
- `default`: Permite renderizar itens customizados sem utilizar o array `:conversations`.

## Exemplos

```blade
<x-sampaui::chat-sidebar :conversations="$conversations" />
```

## Boas práticas

- Cada item do array aceita `id`, `name`, `preview`, `typing`, `time`, `status`, `unread`, `tag`, `avatar`, `active`, `href` e `wireClick`.
- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- A lista de conversas pode vir de propriedades computadas e filtros Livewire.

