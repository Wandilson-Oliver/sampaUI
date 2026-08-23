# Chat Conversation

Área principal da conversa com cabeçalho de contato, timeline com rolagem automática e slot de envio.

Gerencia o cabeçalho com foto, nome e status do contato, botão de retorno responsivo para mobile, área com scroll e slot composer no rodapé.

## Uso

```blade
<x-sampaui::chat-conversation name="Ana Souza" subtitle="Online"><x-sampaui::chat-message>Oi</x-sampaui::chat-message></x-sampaui::chat-conversation>
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `name` | `string` | `Contato` | Nome do contato ou canal ativo. |
| `subtitle` | `string|null` | `null` | Subtítulo do cabeçalho (ex: status, cargo ou empresa). |
| `avatar` | `string|null` | `null` | Foto de perfil do contato. |
| `status` | `online|away|busy|offline|null` | `online` | Indicador de presença no cabeçalho. |
| `back-button` | `bool` | `true` | Exibe botão de voltar para lista no mobile. |
| `auto-scroll` | `bool` | `true` | Executa scroll automático até a última mensagem. |
| `empty` | `bool` | `false` | Exibe estado vazio quando não há mensagens. |
| `empty-title` | `string` | `Nenhuma mensagem ainda` | Título do empty state. |
| `empty-description` | `string` | `Envie a primeira mensagem para iniciar a conversa.` | Descrição do empty state. |

## Slots

- `default`
- `actions`
- `composer`

## Exemplos

```blade
<x-sampaui::chat-conversation name="Ana Souza" subtitle="Online"><x-sampaui::chat-message>Oi</x-sampaui::chat-message></x-sampaui::chat-conversation>
```

## Boas práticas

- Mensagens e composer podem ser renderizados por estado Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
