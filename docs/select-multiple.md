# Select Multiple

O painel usa teleport para `body`, acompanha o trigger e respeita o espaco disponivel acima ou abaixo. Isso preserva tags, busca e navegacao por teclado dentro de Modal e Drawer.

Select multiplo com busca local, tags removiveis e integracao com Livewire via `x-modelable`.

Use para listas pequenas ou medias carregadas no HTML. Para busca remota ou milhares de registros, prefira uma integracao Livewire especifica.

O trigger e o campo de busca interno usam `border-secondary/20`, seguindo a mesma linguagem visual do `input` e do `select`.

```blade
<x-sampaui::select-multiple
    name="roles"
    label="Perfis"
    placeholder="Selecione os perfis"
    search-placeholder="Buscar perfil"
    :options="[
        'admin' => 'Administrador',
        'manager' => 'Gerente',
        'support' => 'Suporte',
    ]"
/>
```

Com valores iniciais:

```blade
<x-sampaui::select-multiple
    name="channels"
    label="Canais"
    :value="['email', 'whatsapp']"
    :options="[
        ['value' => 'email', 'label' => 'Email'],
        ['value' => 'whatsapp', 'label' => 'WhatsApp'],
        ['value' => 'sms', 'label' => 'SMS'],
    ]"
/>
```

Com Livewire:

```blade
<x-sampaui::select-multiple
    name="permissions"
    label="Permissoes"
    wire:model.live="permissions"
    :options="$permissions"
/>
```

No Livewire, mantenha a propriedade como array:

```php
public array $permissions = [];
```

O componente usa `x-modelable="values"` para receber o valor inicial e manter sincronizacao bidirecional. Nao passe `value` junto com `wire:model`.

Estados:

```blade
<x-sampaui::select-multiple
    name="teams"
    label="Times"
    disabled
    :options="$teams"
/>

<x-sampaui::select-multiple
    name="tags"
    label="Tags"
    loading
    :options="[]"
/>

<x-sampaui::select-multiple
    name="categories"
    label="Categorias"
    error="Selecione ao menos uma categoria."
    :options="$categories"
/>
```

Opcoes tambem podem ser desabilitadas individualmente:

```blade
<x-sampaui::select-multiple
    name="features"
    label="Recursos"
    :options="[
        ['value' => 'crm', 'label' => 'CRM'],
        ['value' => 'billing', 'label' => 'Faturamento', 'disabled' => true],
    ]"
/>
```

O dropdown fecha automaticamente ao clicar fora ou pressionar `Esc`.

O componente tambem dispara `select-multiple:changed` com `id`, `name`, `values`, `option` e `action`. Erros do validator sao exibidos automaticamente usando `name` ou o caminho de `wire:model`.

Setas e Enter navegam os resultados; `clearable` limpa a selecao e o campo de busca anuncia lista e estado vazio. O `<select multiple>` real preserva `wire:model`, `required`, erro e descricoes acessiveis.

## Uso

Use `<x-sampaui::select-multiple />` como ponto de partida e adapte apenas o layout com `class=""`.

## Propriedades

- `name`: propriedade pública do componente.
- `label`: propriedade pública do componente.
- `placeholder`: propriedade pública do componente.
- `options`: propriedade pública do componente.
- `value`: propriedade pública do componente.
- `search-placeholder`: propriedade pública do componente.
- `empty-text`: propriedade pública do componente.
- `loading-text`: propriedade pública do componente.
- `disabled`: propriedade pública do componente.
- `readonly`: propriedade pública do componente.
- `loading`: propriedade pública do componente.
- `loading-target`: propriedade pública do componente.
- `hint`: propriedade pública do componente.
- `error`: propriedade pública do componente.
- `state`: propriedade pública do componente.
- `required`: propriedade pública do componente.
- `clearable`: propriedade pública do componente.
- `clear-label`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::select-multiple name="roles" label="Perfis" :options="$roles" wire:model.live="roles" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Sincroniza array de valores com Livewire.
