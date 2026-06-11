# Chat Composer

Formulario compacto para envio de mensagens.

```blade
<x-sampaui::chat-composer
    name="message"
    placeholder="Digite uma mensagem"
    wire:submit.prevent="sendMessage"
/>
```

## Props

- `name`: nome do textarea.
- `placeholder`: texto do textarea.
- `button-label`: rotulo acessivel do botao de envio.
- `rows`: quantidade inicial de linhas.

## Slots

- `before`: acoes antes do textarea, como anexo ou emoji.
- `after`: botao customizado de envio.

Use `wire:submit.prevent` no componente para integrar com Livewire.
