# Componentes

Os componentes sao publicados no namespace `sampaui`.

Documentacao individual:

- [Button](button.md)
- [Input](input.md)
- [Select](select.md)
- [Textarea](textarea.md)
- [Checkbox](checkbox.md)
- [Alert](alert.md)
- [Card](card.md)
- [Toast](toast.md)

## Button

Props:

- `variant`: `primary`, `secondary`, `accent`, `danger`, `outline`, `ghost`, `light`
- `size`: `sm`, `md`, `lg`, `xl`, `2xl`
- `icon`: nome Bootstrap Icons sem o prefixo `bi-`
- `icon-position`: `left` ou `right`
- `rounded`, `loading`, `disabled`, `full`

```blade
<x-sampaui::button variant="outline" size="lg" icon="plus">
    Adicionar imovel
</x-sampaui::button>
```

## Input

```blade
<x-sampaui::input
    name="email"
    label="Email"
    error="Email obrigatorio"
    wire:model.live="email"
/>
```

## Select

```blade
<x-sampaui::select name="type" label="Tipo" placeholder="Selecione">
    <option value="house">Casa</option>
    <option value="apartment">Apartamento</option>
</x-sampaui::select>
```

## Textarea

```blade
<x-sampaui::textarea name="notes" label="Observacoes" rows="6" />
```

## Checkbox

```blade
<x-sampaui::checkbox name="active" label="Ativo" color="accent" checked />
```

## Alert

```blade
<x-sampaui::alert variant="warning" title="Revisao pendente">
    Confira os dados antes de publicar.
</x-sampaui::alert>
```

## Card

```blade
<x-sampaui::card title="Resumo" description="Dados principais">
    Conteudo do card.
</x-sampaui::card>
```

## Toast

```blade
<x-sampaui::toast position="bottom-right" max="3" />
```

## Livewire e Alpine

Atributos dinamicos sao repassados para o elemento principal:

```blade
<x-sampaui::input name="search" wire:model.live="search" x-on:keydown.escape="$wire.clear()" />
```
