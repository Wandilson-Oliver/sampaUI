# Chat Composer

Barra de entrada de mensagens com textarea auto-ajustável, atalho de envio e suporte a anexos.

Componente completo de envio com expansão vertical automática ao digitar, envio rápido com Enter (e nova linha com Shift+Enter), contador de caracteres, slots para botões de anexo e estado de carregamento.

## Uso

```blade
<x-sampaui::chat-composer wire:submit.prevent="sendMessage" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `name` | `string` | `message` | Nome do campo de texto textarea. |
| `placeholder` | `string` | `Digite uma mensagem...` | Texto de orientação do campo. |
| `button-label` | `string` | `Enviar mensagem` | Rótulo acessível (aria-label) do botão de envio. |
| `button-icon` | `string` | `send-fill` | Ícone do botão de envio. |
| `rows` | `int` | `1` | Número inicial de linhas do textarea. |
| `disabled` | `bool` | `false` | Desabilita o campo e o botão de envio. |
| `loading` | `bool` | `false` | Ativa spinner e desabilita o envio. |
| `loading-target` | `string|null` | `null` | Alvo de loading do Livewire (wire:target). |
| `max-length` | `int|null` | `null` | Quantidade máxima de caracteres permitidos. |
| `show-counter` | `bool` | `false` | Exibe contador de caracteres digitados no rodapé. |
| `auto-resize` | `bool` | `true` | Ajusta automaticamente a altura da textarea ao digitar. |
| `submit-on-enter` | `bool` | `true` | Envia o formulário ao pressionar Enter (Shift+Enter insere quebra de linha). |

## Slots

- `default`
- `before`
- `after`

## Exemplos

```blade
<x-sampaui::chat-composer wire:submit.prevent="sendMessage" />
```

## Boas práticas

- Use wire:submit.prevent no form e wire:model no textarea quando precisar controlar a mensagem.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
