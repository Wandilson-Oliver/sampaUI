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

O CSS publicado importa `Plus Jakarta Sans` e usa `Outfit` como fallback visual do pacote.

Para icones, use Bootstrap Icons no projeto consumidor:

```bash
npm install bootstrap-icons
```
