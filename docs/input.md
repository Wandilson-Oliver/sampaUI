# Input

Campo de texto com label, erro e suporte a atributos Livewire.

## Uso

```blade
<x-sampaui::input
    name="email"
    label="Email"
    placeholder="voce@empresa.com"
    wire:model.live="email"
/>
```

## Com icone

Use `icon` para um Bootstrap Icon simples, sem o prefixo `bi-`.

```blade
<x-sampaui::input
    name="email"
    label="Email"
    icon="envelope"
    placeholder="voce@empresa.com"
/>
```

Para casos customizados, use os slots nomeados `prefix` e `suffix`.

```blade
<x-sampaui::input name="password" type="password" label="Senha">
    <x-slot:prefix>
        <i class="bi bi-lock"></i>
    </x-slot:prefix>

    <x-slot:suffix>
        <button type="button" aria-label="Mostrar senha">
            <i class="bi bi-eye"></i>
        </button>
    </x-slot:suffix>
</x-sampaui::input>
```

## Props

- `type`
- `label`
- `name`
- `value`
- `placeholder`
- `error`
- `disabled`
- `icon`: nome Bootstrap Icons sem o prefixo `bi-`

## Slots

- `prefix`: conteudo exibido dentro do campo, à esquerda
- `suffix`: conteudo exibido dentro do campo, à direita
