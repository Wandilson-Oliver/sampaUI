# Instalacao

Instale o pacote via Composer:

```bash
composer require sampaui/sampaui
```

Execute o instalador:

```bash
php artisan sampaui:install
```

O comando publica:

- `config/sampaui.php`
- `public/vendor/sampaui/sampaui.css`
- `public/vendor/sampaui/sampaui.js`
- views customizaveis, quando confirmado no prompt

Tambem e possivel publicar cada grupo manualmente:

```bash
php artisan vendor:publish --tag=sampaui-config
php artisan vendor:publish --tag=sampaui-assets
php artisan vendor:publish --tag=sampaui-views
```

Inclua o CSS no layout principal:

```blade
<link rel="stylesheet" href="{{ asset('vendor/sampaui/sampaui.css') }}">
```

Se usar o `Textarea` com `editor`, inclua tambem o JavaScript publicado:

```blade
<script type="module" src="{{ asset('vendor/sampaui/sampaui.js') }}"></script>
```

Para icones, use Bootstrap Icons no projeto consumidor:

```bash
npm install bootstrap-icons
```
