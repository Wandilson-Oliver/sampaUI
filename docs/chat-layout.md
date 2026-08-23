# Chat Layout

Container estrutural responsivo com sidebar e área de conversa ativa para atendimento, suporte e mensageria.

```blade
<x-sampaui::chat-layout height="44rem">
    <x-slot:sidebar>
        <x-sampaui::chat-sidebar
            title="Atendimentos"
            :conversations="$conversations"
        />
    </x-slot:sidebar>

    <x-sampaui::chat-conversation name="Ana Souza" subtitle="Online agora" status="online">
        <x-sampaui::chat-message time="09:40">Bom dia!</x-sampaui::chat-message>
        <x-sampaui::chat-message from="me" time="09:41" status="Lida">Olá Ana, tudo bem?</x-sampaui::chat-message>

        <x-slot:composer>
            <x-sampaui::chat-composer wire:submit.prevent="sendMessage" />
        </x-slot:composer>
    </x-sampaui::chat-conversation>
</x-sampaui::chat-layout>
```

## Uso

Use `<x-sampaui::chat-layout />` como base para construir telas de chat com lista lateral e conversa ativa. No mobile, a navegação entre a lista e a conversa é gerenciada automaticamente via eventos CustomEvent Alpine (`chat:open-conversation` e `chat:back`).

## Propriedades

| Prop | Tipo | Padrão | Descrição |
| --- | --- | --- | --- |
| `height` | `string` | `'44rem'` | Altura total do container (ex: `'44rem'`, `'600px'`, `'100%'`). |
| `mobile-panel` | `sidebar\|conversation` | `'sidebar'` | Define qual painel fica visível inicialmente em telas mobile. |

## Slots

- `sidebar`: Conteúdo da barra lateral (geralmente `<x-sampaui::chat-sidebar />`).
- `default`: Painel da conversa ativa (geralmente `<x-sampaui::chat-conversation />`).

## Exemplos

```blade
<x-sampaui::chat-layout height="44rem">
    <x-slot:sidebar>
        <x-sampaui::chat-sidebar title="Atendimentos" :conversations="$conversations" />
    </x-slot:sidebar>

    <x-sampaui::chat-conversation name="Ana Souza" subtitle="Online agora" status="online">
        <x-sampaui::chat-message time="09:40">Bom dia!</x-sampaui::chat-message>
        <x-sampaui::chat-message from="me" time="09:41" status="Lida">Olá Ana, tudo bem?</x-sampaui::chat-message>

        <x-slot:composer>
            <x-sampaui::chat-composer wire:submit.prevent="sendMessage" />
        </x-slot:composer>
    </x-sampaui::chat-conversation>
</x-sampaui::chat-layout>
```

## Boas práticas

- Defina uma altura fixa (`height="44rem"` ou `h-[calc(100vh-8rem)]`) para rolagem independente na lista e na timeline.
- Mantenha os atributos de integração Livewire (`wire:model`, `wire:click`) nos componentes internos.
- Estrutura segura e semântica para listas e conversas reativas.

