# Chat Conversation

Área principal da conversa com cabeçalho de contato, timeline com rolagem automática e slot de composer para envio de respostas.

```blade
<x-sampaui::chat-conversation
    name="Ana Souza"
    subtitle="Online agora · Conta Enterprise"
    avatar="https://i.pravatar.cc/160?img=47"
    status="online"
>
    <x-slot:actions>
        <x-sampaui::button variant="ghost" size="sm" icon="telephone" rounded aria-label="Ligar" />
        <x-sampaui::button variant="ghost" size="sm" icon="info-circle" rounded aria-label="Detalhes" />
    </x-slot:actions>

    <x-sampaui::chat-message time="09:40">Bom dia! Poderia me enviar a proposta?</x-sampaui::chat-message>
    <x-sampaui::chat-message from="me" time="09:41" status="Lida">Bom dia, Ana! Enviei em anexo.</x-sampaui::chat-message>

    <x-slot:composer>
        <x-sampaui::chat-composer wire:submit.prevent="sendMessage" />
    </x-slot:composer>
</x-sampaui::chat-conversation>
```

## Uso

Use `<x-sampaui::chat-conversation />` como ponto de partida para exibir a conversa ativa com rolagem automática e integração ao formulário de envio.

## Propriedades

| Prop | Tipo | Padrão | Descrição |
| --- | --- | --- | --- |
| `name` | `string` | `'Contato'` | Nome do contato ou canal ativo. |
| `subtitle` | `string\|null` | `null` | Subtítulo do cabeçalho (ex: status, cargo, empresa). |
| `avatar` | `string\|null` | `null` | URL da foto de perfil. |
| `status` | `online\|away\|busy\|offline\|null` | `'online'` | Indicador visual de presença no cabeçalho. |
| `back-button` | `bool` | `true` | Exibe botão de retorno para a lista no mobile (`chat:back`). |
| `auto-scroll` | `bool` | `true` | Rola automaticamente a timeline para a última mensagem. |
| `empty` | `bool` | `false` | Exibe estado vazio quando não há mensagens. |
| `empty-title` | `string` | `'Nenhuma mensagem ainda'` | Título do empty state. |
| `empty-description` | `string` | `'Envie a primeira mensagem para iniciar a conversa.'` | Descrição do empty state. |

## Slots

- `actions`: Botões de ação no cabeçalho (ex: chamada, info, menu dropdown).
- `header`: Substitui o cabeçalho completo da conversa.
- `composer`: Rodapé para inclusão do `<x-sampaui::chat-composer />`.
- `default`: Lista de mensagens `<x-sampaui::chat-message />` e divisores de data.

## Exemplos

```blade
<x-sampaui::chat-conversation name="Ana Souza" subtitle="Online"><x-sampaui::chat-message>Oi</x-sampaui::chat-message></x-sampaui::chat-conversation>
```

## Boas práticas

- O container de mensagens possui `role="log"` e `aria-live="polite"` para leitores de tela.
- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Mensagens e composer podem ser renderizados por estado Livewire.

