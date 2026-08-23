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

## Propriedades

- `label`
- `name`
- `placeholder`
- `icon`: nome Bootstrap Icons sem o prefixo `bi-`

## Slots

- `prefix`
- `suffix`

O Phone herda do Input os estados acessiveis, `hint`, `clearable`, `readonly`, `loading`, `loading-target`, prefixo e sufixo, preservando a mascara e a sincronizacao Livewire.

## Propriedades adicionais

- `error`: propriedade pública do componente.
- `state`: propriedade pública do componente.
- `disabled`: propriedade pública do componente.
- `required`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::phone name="phone" label="Telefone" wire:model.live="phone" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Formata telefone brasileiro internamente e sincroniza o model Alpine/Livewire.
