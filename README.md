# SampaUI

SampaUI e um pacote de componentes Blade para Laravel 13, Livewire 4 e Tailwind CSS 4, com visual premium para aplicacoes corporativas, imobiliarias e SaaS.

## Requisitos

- PHP 8.3+
- Laravel 13+
- Livewire 4+
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

Instale Bootstrap Icons no projeto consumidor:

```bash
npm install bootstrap-icons
```

## Componentes

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

### Textarea

```blade
<x-sampaui::textarea name="description" label="Descricao" rows="5" />
```

### Checkbox

```blade
<x-sampaui::checkbox name="terms" label="Aceito os termos" color="accent" wire:model="terms" />
```

## Customizacao

Todos os componentes aceitam `class=""` e preservam atributos Livewire/Alpine:

```blade
<x-sampaui::button
    variant="accent"
    size="2xl"
    icon="plus"
    class="w-full shadow-none bg-danger"
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
