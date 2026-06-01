# Instalacao

Instale o pacote via Composer:

```bash
composer require sampaui/sampaui
```

O pacote e exclusivo para projetos com Laravel 13+, Livewire 4+, Tailwind CSS 4 e AlpineJS. Os componentes interativos assumem Alpine carregado pelo projeto e os atributos `wire:*` sao preservados para o Livewire.

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

## Checklist de release

Antes de publicar uma nova versao do pacote:

```bash
composer test
npm run build
```

Depois valide em um app consumidor:

```bash
php artisan vendor:publish --tag=sampaui-assets --force
php artisan view:clear
```

Confirme tambem que a documentacao renderiza os componentes principais, exemplos Livewire preservam `wire:*` e a paleta personalizada continua alinhada entre `config/sampaui.php` e `resources/css/sampaui.css`.
