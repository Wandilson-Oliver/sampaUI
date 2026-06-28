# Chat Sidebar

Lista lateral de conversas para telas de atendimento, suporte e CRM.

```blade
<x-sampaui::chat-sidebar
    title="Atendimento"
    subtitle="12 conversas abertas"
    :conversations="[
        ['id' => 1, 'name' => 'Ana Souza', 'preview' => 'Enviei os documentos.', 'time' => '09:42', 'status' => 'online', 'unread' => 2, 'active' => true, 'wireClick' => 'openConversation(1)'],
        ['id' => 2, 'name' => 'Bruno Lima', 'typing' => true, 'time' => '08:15', 'href' => '/chat/2'],
    ]"
/>
```

## Props

- `title`: titulo do painel.
- `subtitle`: texto auxiliar.
- `conversations`: array de conversas.
- `search-placeholder`: placeholder da busca.
- `search-name`: nome do campo nativo.
- `empty-title`, `empty-description`: estado vazio.

## Slots

- `actions`: comandos no topo.
- `default`: renderizacao customizada da lista.

Cada conversa aceita `id`, `name`, `preview`, `typing`, `time`, `status`, `unread`, `active`, `href` e `wireClick`. Ao selecionar, o item abre o painel de conversa no mobile.
