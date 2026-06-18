# SampaUI

SampaUI e um pacote de componentes Blade Livewire-first para Laravel 13, Livewire 4, Tailwind CSS 4 e AlpineJS. O pacote foi padronizado para produtos imobiliarios: CRM de leads, captacao de imoveis, funil comercial, atendimento por chat, propostas, dashboards operacionais e paginas de autenticacao.

## Requisitos

- PHP 8.3+
- Laravel 13+
- Livewire 4+
- AlpineJS
- Bootstrap Icons incluido no CSS compilado do pacote

## Instalacao

```bash
composer require sampaui/sampaui
```

Finalize a instalacao:

```bash
php artisan sampaui:install
```

O instalador publica a configuracao/assets e registra o pacote no build principal do Vite:

```css
/* resources/css/app.css */
@import "../../vendor/sampaui/sampaui/dist/sampaui.css";
```

```js
// resources/js/app.js
import "../../vendor/sampaui/sampaui/dist/sampaui.js";
```

Depois rode o build normal do projeto consumidor:

```bash
npm run build
```

O CSS compilado ja importa a fonte padrao do pacote: `Plus Jakarta Sans`, com `Outfit` como fallback visual. O arquivo JS registra `window.SampaUI` e mantem um ponto unico para comportamentos futuros do pacote.

## Comandos

```bash
php artisan sampaui:about
php artisan sampaui:list
php artisan sampaui:doctor
php artisan sampaui:docs-export --format=json
```

O pacote mantem um registry oficial em `resources/metadata/components.php`, exportado para `docs/registry/components.json` e descrito em `llms.txt`/`llms-full.txt` para facilitar uso por Codex e outras ferramentas de IA.

## Componentes

Use os componentes do namespace `sampaui` antes de criar HTML solto. O objetivo e manter telas imobiliarias com a mesma hierarquia visual, bordas, foco, estados e densidade de informacao.

Fluxos recomendados:

- **Captacao**: `input`, `phone`, `currency-br`, `cep`, `select-search`, `select-multiple`, `textarea`, `file-upload` e `avatar-upload`.
- **CRM e funil**: `card`, `badge`, `progress`, `table`, `dropdown`, `drawer`, `tabs`, `pagination` e `empty-state`.
- **Atendimento**: `chat-layout`, `chat-sidebar`, `chat-conversation`, `chat-message`, `chat-composer`, `avatar`, `indicator` e `toast`.
- **Operacao e seguranca**: `header`, `sidebar`, `command-palette`, `modal`, `alert`, `pin`, `checkbox` e `button`.

Exemplo rapido de card imobiliario:

```blade
<x-sampaui::card title="Apartamento Vila Mariana" description="Lead quente em negociacao" padding="lg">
    <div class="flex flex-wrap items-center gap-2">
        <x-sampaui::badge variant="success">Disponivel</x-sampaui::badge>
        <x-sampaui::badge variant="accent">R$ 890.000</x-sampaui::badge>
        <x-sampaui::badge variant="light">2 dorms</x-sampaui::badge>
    </div>

    <div class="mt-5 flex flex-wrap gap-3">
        <x-sampaui::button icon="calendar2-check">Agendar visita</x-sampaui::button>
        <x-sampaui::button variant="outline" icon="chat-dots">Conversar</x-sampaui::button>
    </div>
</x-sampaui::card>
```

## Fundamentos adotados

O SampaUI segue o conceito Blade-first: componentes anonimos, CSS compilado, Bootstrap Icons e customizacao por `class=""`. A refatoracao de referencia incorporou boas praticas dos frameworks mais usados em 2025 sem mudar a identidade do pacote:

- stack fechado e previsivel: Laravel 13+, Livewire 4+, Tailwind 4 e AlpineJS;
- API publica pensada para Livewire: `wire:model`, `wire:click`, `wire:navigate`, eventos do browser e estados reativos sem adaptadores extras;
- helpers internos para padronizar foco, erro, disabled, triggers e variantes com a paleta semantica SampaUI;
- exemplos copiaveis e composicao por slots;
- props previsiveis para variantes, tamanhos e estados;
- foco em acessibilidade, `aria-*`, labels e estados desabilitados;
- preservacao de atributos Livewire/Alpine no elemento real;
- documentacao com preview renderizado, API completa e checklist de uso.

## Paleta oficial

O SampaUI usa uma paleta semantica personalizada, publicada em `config/sampaui.php` e compilada no CSS do pacote:

```txt
primary, secondary, accent, danger, light, success, warning, info, purple, muted
```

Use classes como `bg-primary`, `text-secondary`, `border-light`, `bg-accent/10` e `focus:ring-primary/20`. A customizacao local deve preferir `class=""` e tokens oficiais antes de usar hexadecimais diretos.

Variantes principais:

- `Button`: `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted`, `light`, `ghost`, `outline`
- `Badge` e `Progress`: `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted`, `light`
- `Alert`: `success`, `danger`/`error`, `warning`, `info`
- `Card` e `Drawer`: `default`, `muted`, `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`

### Button

```blade
<x-sampaui::button variant="primary" icon="plus">
    Adicionar
</x-sampaui::button>

<x-sampaui::button variant="outline" size="lg" icon="arrow-right" icon-position="right">
    Continuar
</x-sampaui::button>

<x-sampaui::button icon="trash" rounded />

<x-sampaui::button href="/clientes" wire:navigate icon="arrow-right">
    Ver clientes
</x-sampaui::button>
```

### Input

```blade
<x-sampaui::input
    name="email"
    label="Email"
    icon="envelope"
    placeholder="voce@empresa.com"
    wire:model.live="email"
/>

<x-sampaui::input
    name="password"
    type="password"
    label="Senha"
    icon="lock"
    wire:model="password"
/>
```

Todos os componentes de entrada aceitam `wire:model` diretamente no controle real ou via `x-modelable`, sem exigir a prop `value`.

Campos textuais usam `border-secondary/20` como borda padrao, incluindo `input`, campos com mascara e `textarea`. Controles de escolha, busca, upload e datas mantem `border-secondary/40` para preservar contraste em superficies interativas. O `toggle` usa a cor definida em `color` no trilho e no botao interno quando desligado.

```blade
<x-sampaui::phone name="phone" label="Telefone" wire:model.live="phone" />

<x-sampaui::currency-br name="price" label="Valor" wire:model.live="price" />

<x-sampaui::cep name="postal_code" label="CEP" wire:model.live="postal_code" />
```

Os campos `phone`, `currency-br` e `cep` formatam valores internamente com Alpine inline e nao exigem plugin externo de mascara.

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
