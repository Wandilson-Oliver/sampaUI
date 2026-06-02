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
- `public/vendor/sampaui/sampaui.js`
- import do CSS em `resources/css/app.css`
- import do JS em `resources/js/app.js`
- views customizaveis, quando confirmado no prompt

Depois rode o build do projeto consumidor:

```bash
npm run build
```

O pacote passa a ser compilado junto com o `app.css` e `app.js` da aplicacao. Se voce quiser somente publicar arquivos sem tocar nos imports do Vite, use:

```bash
php artisan sampaui:install --skip-frontend
```

Tambem e possivel publicar cada grupo manualmente:

```bash
php artisan vendor:publish --tag=sampaui-config
php artisan vendor:publish --tag=sampaui-assets
php artisan vendor:publish --tag=sampaui-views
```

O instalador adiciona o import de `Plus Jakarta Sans`/`Outfit` no topo do `app.css`. O CSS compilado do pacote ja inclui Bootstrap Icons e as fontes necessarias para os icones `bi`.

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
