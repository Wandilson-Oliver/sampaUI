# Chat Message

Bolha de mensagem para conversas.

```blade
<x-sampaui::chat-message time="09:40">
    O cliente confirmou a visita.
</x-sampaui::chat-message>

<x-sampaui::chat-message from="me" time="09:41" status="Lida">
    Perfeito, vou atualizar o CRM.
</x-sampaui::chat-message>

<x-sampaui::chat-message from="system">
    Atendimento transferido para Comercial.
</x-sampaui::chat-message>
```

## Props

- `from`: `contact`, `me`, `outgoing` ou `system`.
- `author`: nome exibido acima do texto.
- `time`: horario da mensagem.
- `status`: texto para leitores de tela; exibe o icone de mensagem lida.
