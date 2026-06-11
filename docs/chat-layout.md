# Chat Layout

Estrutura base para telas de chat com lista lateral e conversa ativa.

```blade
<x-sampaui::chat-layout height="42rem">
    <x-slot:sidebar>
        <x-sampaui::chat-sidebar :conversations="$conversations" />
    </x-slot:sidebar>

    <x-sampaui::chat-conversation name="Ana Souza" subtitle="Online agora">
        ...
    </x-sampaui::chat-conversation>
</x-sampaui::chat-layout>
```

## Props

- `height`: altura do painel. Padrao: `42rem`.

## Slots

- `sidebar`: lista de conversas.
- `default`: conversa ativa.
