# Componentes

Os componentes sao publicados no namespace `sampaui`.

Documentacao individual:

- [Fundamentos](foundations.md)
- [Button](button.md)
- [Input](input.md)
- [Select](select.md)
- [Select Search](select-search.md)
- [Textarea](textarea.md)
- [Checkbox](checkbox.md)
- [Radio](radio.md)
- [DatePicker](date-picker.md)
- [Alert](alert.md)
- [Card](card.md)
- [Header](header.md)
- [Sidebar](sidebar.md)
- [Toast](toast.md)
- [Table](table.md)
- [Pagination](pagination.md)

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

## Select Search

```blade
<x-sampaui::select-search
    name="owner"
    label="Responsavel"
    placeholder="Selecione um responsavel"
    :options="[
        'ana' => 'Ana Souza',
        'bruno' => 'Bruno Lima',
    ]"
/>
```

## Textarea

```blade
<x-sampaui::textarea name="notes" label="Observacoes" rows="6" />
```

## Checkbox

```blade
<x-sampaui::checkbox name="active" label="Ativo" color="accent" checked />
```

## Radio

```blade
<x-sampaui::radio
    name="status"
    label="Status"
    value="active"
    :options="['active' => 'Ativo', 'paused' => 'Pausado']"
/>
```

## DatePicker

```blade
<x-sampaui::date-picker
    name="published_at"
    label="Data de publicacao"
    value="2026-05-25"
    clearable
/>
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

## Header

```blade
<x-sampaui::header
    title="Clientes"
    subtitle="Gerencie relacionamentos comerciais"
    eyebrow="CRM"
    status="Atualizado agora"
    menu
>
    <x-slot:actions>
        <x-sampaui::button icon="plus">Novo cliente</x-sampaui::button>
    </x-slot:actions>
</x-sampaui::header>
```

## Sidebar

```blade
<x-sampaui::sidebar
    brand="LIACOR"
    initial-state="open"
    brand-href="/dashboard"
    active-color="#7057F6"
    :user="['name' => 'Administrador Lia', 'email' => 'admin@liacorretora.com']"
    :items="[
        ['label' => 'Dashboard', 'href' => '/dashboard', 'icon' => 'grid', 'active' => true],
        ['label' => 'Clientes', 'href' => '/clients', 'icon' => 'people', 'navigate' => true],
    ]"
/>
```

## Toast

```blade
<x-sampaui::toast position="bottom-right" max="3" />
```

## Table

```blade
<x-sampaui::table
    :columns="['name' => 'Cliente', 'status' => 'Status']"
    :rows="[
        ['name' => 'Ana Souza', 'status' => 'Ativo'],
    ]"
/>
```

## Pagination

```blade
<x-sampaui::pagination
    :current-page="2"
    :last-page="8"
    :total="80"
    :per-page="10"
    previous-url="/clientes?page=1"
    next-url="/clientes?page=3"
/>
```

## Livewire e Alpine

Atributos dinamicos sao repassados para o elemento principal:

```blade
<x-sampaui::input name="search" wire:model.live="search" x-on:keydown.escape="$wire.clear()" />
```
