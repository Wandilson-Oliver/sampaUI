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
- `disabled`, `loading`, `loading-target`: estados de envio.
- `max-length` e `show-counter`: limite e contador acessivel.
- `auto-resize`: expande o textarea ate a altura maxima.
- `submit-on-enter`: envia com Enter e preserva Shift+Enter para quebra de linha.

## Slots

- `before`: acoes antes do textarea, como anexo ou emoji.
- `after`: botao customizado de envio.

Use `wire:submit.prevent` no componente e `wire:model` no proprio `chat-composer` para integrar com Livewire.
