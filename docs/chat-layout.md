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
- `mobile-panel`: `sidebar` ou `conversation`. No mobile, apenas um painel fica visivel por vez.

## Slots

- `sidebar`: lista de conversas.
- `default`: conversa ativa.

Itens do `chat-sidebar` disparam `chat:open-conversation`; o botao de retorno do `chat-conversation` dispara `chat:back`.
