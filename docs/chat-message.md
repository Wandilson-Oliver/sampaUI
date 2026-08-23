# Chat Message

Bolha de mensagem estilizada para mensagens recebidas, enviadas ou avisos de sistema.

Renderiza bolhas modernas com cantos arredondados assimétricos, timestamps, suporte a nome de autor, avatar e status de entrega automáticos (enviada, entregue, lida, erro).

## Uso

```blade
<x-sampaui::chat-message from="me" time="09:42" status="Lida">Mensagem enviada.</x-sampaui::chat-message>
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `from` | `contact|me|outgoing|incoming|system` | `contact` | Origem da mensagem (contato, própria ou aviso do sistema). |
| `author` | `string|null` | `null` | Nome do autor exibido acima da mensagem. |
| `time` | `string|null` | `null` | Horário da mensagem (ex: 10:45). |
| `status` | `sent|delivered|read|failed|enviada|entregue|lida|erro|null` | `null` | Status de entrega com ícones automatizados (checks duplos, check simples ou alerta). |
| `avatar` | `string|null` | `null` | URL da foto do autor da mensagem. |
| `show-avatar` | `bool` | `false` | Exibe avatar circular ao lado da bolha de mensagem. |

## Slots

- `default`

## Exemplos

```blade
<x-sampaui::chat-message from="me" time="09:42" status="Lida">Mensagem enviada.</x-sampaui::chat-message>
```

## Boas práticas

- Renderize em loops com mensagens vindas de propriedades Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
