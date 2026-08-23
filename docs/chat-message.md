# Chat Message

Bolha de mensagem para conversas com suporte a mensagens enviadas, recebidas ou avisos de sistema.

```blade
{{-- Mensagem do Contato (Recebida) --}}
<x-sampaui::chat-message author="Lucas Mendes" time="09:40" show-avatar>
    Olá! Poderia me enviar a segunda via da fatura?
</x-sampaui::chat-message>

{{-- Mensagem Própria (Enviada) --}}
<x-sampaui::chat-message from="me" time="09:41" status="Lida">
    Com certeza Lucas! Segue em anexo em formato PDF.
</x-sampaui::chat-message>

{{-- Mensagem do Sistema --}}
<x-sampaui::chat-message from="system">
    Atendimento transferido para o setor Financeiro às 09:42
</x-sampaui::chat-message>
```

## Uso

Use `<x-sampaui::chat-message />` para renderizar mensagens individuais dentro da conversa, alternando entre mensagens recebidas (`from="contact"`), enviadas (`from="me"`) ou avisos (`from="system"`).

## Propriedades

| Prop | Tipo | Padrão | Descrição |
| --- | --- | --- | --- |
| `from` | `contact\|me\|outgoing\|incoming\|system` | `'contact'` | Direção da mensagem. Use `'me'` para envio próprio e `'system'` para avisos. |
| `author` | `string\|null` | `null` | Nome do autor exibido no topo da bolha. |
| `time` | `string\|null` | `null` | Horário da mensagem (ex: `'09:42'`). |
| `status` | `string\|null` | `null` | Status de entrega: `'enviada'`, `'entregue'`, `'lida'`, `'erro'` (ou em inglês: `'sent'`, `'delivered'`, `'read'`, `'failed'`). |
| `avatar` | `string\|null` | `null` | URL da foto do autor da mensagem. |
| `show-avatar` | `bool` | `false` | Exibe o avatar circular ao lado da bolha de mensagem. |

## Exemplos

```blade
<x-sampaui::chat-message from="me" time="09:42" status="Lida">Mensagem enviada.</x-sampaui::chat-message>
```

## Boas práticas

- Ícones de confirmação de leitura (`lida`, `entregue`, `enviada`) são exibidos automaticamente com base na propriedade `status`.
- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Renderize em loops com mensagens vindas de propriedades Livewire.

