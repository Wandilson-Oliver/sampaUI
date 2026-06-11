# Chat Sidebar

Lista lateral de conversas para telas de atendimento, suporte e CRM.

```blade
<x-sampaui::chat-sidebar
    title="Atendimento"
    subtitle="12 conversas abertas"
    :conversations="[
        ['name' => 'Ana Souza', 'preview' => 'Enviei os documentos.', 'time' => '09:42', 'status' => 'online', 'unread' => 2, 'active' => true],
        ['name' => 'Bruno Lima', 'preview' => 'Podemos falar hoje?', 'time' => '08:15'],
    ]"
/>
```

## Props

- `title`: titulo do painel.
- `subtitle`: texto auxiliar.
- `conversations`: array de conversas.
- `search-placeholder`: placeholder da busca.

## Slots

- `actions`: comandos no topo.
- `default`: renderizacao customizada da lista.
