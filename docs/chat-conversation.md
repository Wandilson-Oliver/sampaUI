# Chat Conversation

Painel da conversa ativa com cabecalho, mensagens e composer.

```blade
<x-sampaui::chat-conversation name="Ana Souza" subtitle="Online agora" status="online">
    <x-sampaui::chat-message time="09:40">Bom dia.</x-sampaui::chat-message>
    <x-sampaui::chat-message from="me" time="09:41" status="Lida">Bom dia, Ana.</x-sampaui::chat-message>

    <x-slot:composer>
        <x-sampaui::chat-composer wire:submit.prevent="sendMessage" />
    </x-slot:composer>
</x-sampaui::chat-conversation>
```

## Props

- `name`: nome do contato ou canal.
- `subtitle`: status textual.
- `avatar`: imagem opcional.
- `status`: estado do avatar: `online`, `busy`, `away`, `offline`.
- `back-button`: exibe retorno para a lista no mobile.
- `auto-scroll`: posiciona a conversa no fim ao inicializar.
- `empty`, `empty-title`, `empty-description`: estado vazio padronizado.

## Slots

- `actions`: botoes do cabecalho.
- `composer`: campo de envio.
- `default`: mensagens.

O container de mensagens usa `role="log"`, rolagem propria e integra automaticamente com o painel mobile do `chat-layout`.
