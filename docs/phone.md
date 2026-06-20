# Phone

Campo de telefone com mascara brasileira interna e base visual do componente `input`.

O componente remove caracteres nao numericos, limita o valor a 11 digitos e formata telefones brasileiros sem exigir plugin externo de mascara do Alpine.

## Uso

```blade
<x-sampaui::phone
    name="phone"
    label="Telefone"
    wire:model.live="phone"
/>
```

## Props

- `label`
- `name`
- `placeholder`
- `icon`: nome Bootstrap Icons sem o prefixo `bi-`

## Slots

- `prefix`
- `suffix`

O Phone herda do Input os estados acessiveis, `hint`, `clearable`, `readonly`, `loading`, `loading-target`, prefixo e sufixo, preservando a mascara e a sincronizacao Livewire.
