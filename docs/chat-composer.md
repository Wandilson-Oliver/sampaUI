# Chat Composer

Formulário compacto para envio de mensagens com textarea auto-ajustável, atalhos de teclado e botões de ação rápida.

```blade
<x-sampaui::chat-composer
    name="messageText"
    placeholder="Escreva sua mensagem aqui..."
    wire:submit.prevent="sendMessage"
    wire:model.live="messageText"
    max-length="500"
    show-counter
>
    <x-slot:before>
        <x-sampaui::button type="button" variant="ghost" size="sm" icon="paperclip" rounded aria-label="Anexar documento" />
        <x-sampaui::button type="button" variant="ghost" size="sm" icon="emoji-smile" rounded aria-label="Inserir emoji" />
    </x-slot:before>
</x-sampaui::chat-composer>
```

## Uso

Use `<x-sampaui::chat-composer />` como campo de envio em formulários de chat. O componente suporta auto-ajuste de altura, atalhos de teclado (Enter para enviar, Shift+Enter para nova linha) e slots para anexos.

## Propriedades

| Prop | Tipo | Padrão | Descrição |
| --- | --- | --- | --- |
| `name` | `string` | `'message'` | Nome do campo textarea. |
| `placeholder` | `string` | `'Digite uma mensagem...'` | Texto de orientação do campo. |
| `button-label` | `string` | `'Enviar mensagem'` | Rótulo de acessibilidade do botão de envio. |
| `button-icon` | `string` | `'send-fill'` | Ícone do botão de envio. |
| `rows` | `int` | `1` | Número inicial de linhas visíveis. |
| `disabled` | `bool` | `false` | Desabilita o textarea e o botão de envio. |
| `loading` | `bool` | `false` | Ativa spinner e desabilita o envio. |
| `loading-target` | `string\|null` | `null` | Alvo de loading do Livewire (`wire:target`). |
| `max-length` | `int\|null` | `null` | Quantidade máxima de caracteres permitidos. |
| `show-counter` | `bool` | `false` | Exibe contador de caracteres digitados. |
| `auto-resize` | `bool` | `true` | Expande dinamicamente a altura ao digitar texto longo. |
| `submit-on-enter` | `bool` | `true` | Envia ao pressionar Enter (Shift+Enter insere quebra de linha). |

## Slots

- `before`: Ações antes do campo de texto (ex: botões de anexo, emoji, áudio).
- `after`: Substitui o botão padrão de envio por um componente customizado.

## Exemplos

```blade
<x-sampaui::chat-composer wire:submit.prevent="sendMessage" />
```

## Boas práticas

- Use `wire:submit.prevent` no form e `wire:model` no textarea para integração reativa com Livewire.
- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- O textarea possui `auto-resize` nativo e atalhos de teclado para envio ágil sem necessidade de scripts externos.

