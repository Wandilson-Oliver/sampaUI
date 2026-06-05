# Select Multiple

Select multiplo com busca local, tags removiveis e integracao com Livewire via `x-modelable`.

Use para listas pequenas ou medias carregadas no HTML. Para busca remota ou milhares de registros, prefira uma integracao Livewire especifica.

O trigger e o campo de busca interno usam `border-secondary/50`, seguindo a borda padrao dos componentes de formulario.

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

O componente tambem dispara `select-multiple:changed` com `id`, `name`, `values`, `option` e `action`.
