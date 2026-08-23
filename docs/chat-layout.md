# Chat Layout

Container estrutural responsivo com sidebar e área de conversa ativa para atendimento e mensageria.

Organiza o fluxo de mensagens em duas colunas no desktop (lista de conversas e conversa ativa) e alterna automaticamente para visualização em tela cheia no mobile via eventos Alpine (chat:open-conversation e chat:back). Suporta altura customizada e classes utilitárias sem quebrar o alinhamento.

## Uso

```blade
<x-sampaui::chat-layout><x-slot:sidebar>Conversas</x-slot:sidebar>Chat</x-sampaui::chat-layout>
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `height` | `string` | `44rem` | Altura total do layout de mensagens (ex: 44rem, 600px, 100%). |
| `mobile-panel` | `sidebar|conversation` | `sidebar` | Define qual painel fica visível inicialmente em telas mobile. |

## Slots

- `default`
- `sidebar`

## Exemplos

```blade
<x-sampaui::chat-layout><x-slot:sidebar>Conversas</x-slot:sidebar>Chat</x-sampaui::chat-layout>
```

## Boas práticas

- Estrutura segura para listas e conversas reativas.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
