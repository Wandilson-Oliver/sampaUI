# SampaUI

SampaUI e um pacote de componentes Blade Livewire-first, exclusivo para aplicacoes a partir de Laravel 13, Livewire 4, Tailwind CSS 4 e AlpineJS, com visual premium para aplicacoes corporativas, imobiliarias e SaaS.

## Requisitos

- PHP 8.3+
- Laravel 13+
- Livewire 4+
- AlpineJS
- Bootstrap Icons

## Instalacao

```bash
composer require sampaui/sampaui
```

Publique os assets compilados e a configuracao:

```bash
php artisan sampaui:install
```

Inclua o CSS publicado no layout da aplicacao:

```blade
<link rel="stylesheet" href="{{ asset('vendor/sampaui/sampaui.css') }}">
```

O CSS compilado ja importa a fonte padrao do pacote: `Plus Jakarta Sans`, com `Outfit` como fallback visual.

Instale Bootstrap Icons no projeto consumidor:

```bash
npm install bootstrap-icons
```

## Componentes

## Fundamentos adotados

O SampaUI segue o conceito Blade-first: componentes anonimos, CSS compilado, Bootstrap Icons, tokens oficiais e customizacao por `class=""`. A refatoracao de referencia incorporou boas praticas dos frameworks mais usados em 2025 sem mudar a identidade do pacote:

- stack fechado e previsivel: Laravel 13+, Livewire 4+, Tailwind 4 e AlpineJS;
- API publica pensada para Livewire: `wire:model`, `wire:click`, `wire:navigate`, eventos do browser e estados reativos sem adaptadores extras;
- helpers internos para padronizar foco, erro, disabled, triggers e cores;
- exemplos copiaveis e composicao por slots;
- props previsiveis para variantes, tamanhos e estados;
- foco em acessibilidade, `aria-*`, labels e estados desabilitados;
- preservacao de atributos Livewire/Alpine no elemento real;
- documentacao com preview renderizado, API completa e checklist de uso.

### Button

```blade
<x-sampaui::button variant="primary" icon="plus">
    Adicionar
</x-sampaui::button>

<x-sampaui::button variant="outline" size="lg" icon="arrow-right" icon-position="right">
    Continuar
</x-sampaui::button>

<x-sampaui::button icon="trash" rounded />
```

### Input

```blade
<x-sampaui::input
    name="email"
    label="Email"
    placeholder="voce@empresa.com"
    wire:model.live="email"
/>
```

### Select

```blade
<x-sampaui::select name="status" label="Status" placeholder="Selecione">
    <option value="active">Ativo</option>
    <option value="inactive">Inativo</option>
</x-sampaui::select>
```

### Select Search

```blade
<x-sampaui::select-search
    name="owner"
    label="Responsavel"
    placeholder="Selecione um responsavel"
    wire:model.live="owner"
    :options="[
        'ana' => 'Ana Souza',
        'bruno' => 'Bruno Lima',
        'carla' => 'Carla Martins',
    ]"
/>
```

### Textarea

```blade
<x-sampaui::textarea name="description" label="Descricao" rows="5" />

<x-sampaui::textarea
    name="description"
    label="Descricao"
    error="Inclua uma descricao antes de continuar."
    wire:model.live.debounce.700ms="description"
/>
```

### Checkbox

```blade
<x-sampaui::checkbox name="terms" label="Aceito os termos" color="accent" wire:model="terms" />
```

### Radio

```blade
<x-sampaui::radio
    name="status"
    label="Status"
    value="active"
    inline
    :options="['active' => 'Ativo', 'paused' => 'Pausado']"
/>
```

### DatePicker

```blade
<x-sampaui::date-picker
    name="scheduled_at"
    label="Data do agendamento"
    min="2026-05-01"
    max="2026-12-31"
    clearable
    wire:model.live="scheduledAt"
/>
```

### Alert

```blade
<x-sampaui::alert variant="success" title="Lead atualizado">
    As alteracoes foram sincronizadas.
</x-sampaui::alert>
```

### Card

```blade
<x-sampaui::card title="Contrato" description="Em analise" variant="primary">
    Proposta aguardando revisao juridica.

    <x-slot:footer>
        Atualizado ha 3 minutos.
    </x-slot:footer>
</x-sampaui::card>
```

### Header

```blade
<x-sampaui::header
    title="Clientes"
    subtitle="Gerencie relacionamentos comerciais"
    eyebrow="CRM"
    status="Atualizado agora"
>
    <x-slot:actions>
        <x-sampaui::button icon="plus">Novo cliente</x-sampaui::button>
    </x-slot:actions>
</x-sampaui::header>
```

### Sidebar

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

### Toast

Inclua uma vez no layout e dispare eventos `toast` no browser:

```blade
<x-sampaui::toast />

<x-sampaui::button
    icon="bell"
    onclick="window.dispatchEvent(new CustomEvent('toast', { detail: { type: 'success', title: 'Salvo', message: 'Alteracoes publicadas.' } }))"
>
    Abrir toast
</x-sampaui::button>
```

### Table

```blade
<x-sampaui::table
    :columns="[
        'name' => 'Cliente',
        'status' => 'Status',
        'amount' => ['label' => 'Valor', 'key' => 'amount', 'align' => 'right'],
    ]"
    :rows="[
        ['name' => 'Ana Souza', 'status' => 'Ativo', 'amount' => 'R$ 1.200,00'],
    ]"
/>
```

### Pagination

```blade
<x-sampaui::pagination
    :current-page="2"
    :last-page="8"
    :total="80"
    :per-page="10"
    wire-method="gotoPage"
/>
```

```js
window.dispatchEvent(new CustomEvent('toast', {
    detail: { type: 'success', title: 'Salvo', message: 'Alteracoes publicadas.' }
}))
```

## Customizacao

Todos os componentes aceitam `class=""` e preservam atributos Livewire/Alpine:

```blade
<x-sampaui::button
    variant="accent"
    size="2xl"
    icon="plus"
    class="w-full bg-danger"
    wire:click="save"
>
    Salvar
</x-sampaui::button>
```

## Desenvolvimento

```bash
composer install
npm install
npm run build
composer test
```

## Licenca

MIT.
