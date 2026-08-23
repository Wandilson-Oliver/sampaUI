# Avatar Upload

Use para upload de foto de perfil com preview circular, acao de editar e remocao enviada no submit.

```blade
<x-sampaui::avatar-upload
    name="avatar"
    label="Foto do perfil"
    src="{{ $user->avatar_url }}"
    remove-name="avatar_remove"
    remove-model="avatarRemove"
    wire:model="avatar"
/>
```

## Propriedades

- `name`, `label`, `src`, `alt`, `accept`.
- `size`: `sm`, `md`, `lg`, `xl`, `2xl`.
- `placeholder`: texto exibido quando nao existe imagem.
- `help`: texto opcional abaixo do avatar.
- `remove-name`: nome do input hidden enviado como `1` quando o usuario remove a imagem.
- `remove-model`: propriedade Livewire opcional sincronizada com a flag de remocao.
- `remove-label`, `upload-label`: textos acessiveis dos botoes.
- `error`, `disabled`.

O input real preserva atributos Livewire e HTML. Para Livewire, use `WithFileUploads` no componente PHP, `wire:model` no `avatar-upload` e `remove-model` para ler a remocao no metodo de salvar.

## Estados e acessibilidade

Aceita `hint`, `required`, `loading`, `loading-target`, `disabled` e erro. Label, hint e erro sao associados ao input real; a remocao tambem sincroniza `input` e `change` com Livewire.

## Uso

Use `<x-sampaui::avatar-upload />` como ponto de partida e adapte apenas o layout com `class=""`.

## Exemplos

```blade
<x-sampaui::avatar-upload name="avatar" label="Foto" wire:model="avatar" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Use com wire:model para uploads do Livewire.
