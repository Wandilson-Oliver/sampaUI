# Brand Mark

Identidade visual e marca compacta do SampaUI para sidebars, cabeçalhos, telas de autenticação e estados institucionais.

Suporta logos SVG/PNG customizadas, monograma nativo do SampaUI com ícone opcional, subtítulos institucionais, badges de versão/plano, layouts horizontal ou empilhado (stacked) e navegação SPA com `wire:navigate`.

## Uso

```blade
<x-sampaui::brand-mark label="SampaUI" subtitle="Design System" href="/" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `logo` | `string|null` | `null` | URL de arquivo SVG ou imagem de logotipo customizado. |
| `icon` | `string|null` | `null` | Nome do ícone Bootstrap Icons renderizado sobre a marca monograma nativa. |
| `label` | `string|null` | `null` | Nome principal da marca ou empresa. |
| `subtitle` | `string|null` | `null` | Texto auxiliar descritivo ou slogan institucional. |
| `badge` | `string|null` | `null` | Rótulo da badge (ex: `'v1.0'`, `'PRO'`). |
| `badge-variant` | `string` | `primary` | Variante de cor da badge (`primary`, `success`, `danger`, `purple`, etc.). |
| `badge-appearance` | `string` | `soft` | Estilo da badge (`soft`, `solid`, `outline`). |
| `layout` | `horizontal|vertical|stacked` | `horizontal` | Disposição da marca e texto (`horizontal` em linha ou `vertical`/`stacked` empilhado e centralizado). |
| `size` | `xs|sm|md|lg|xl|2xl` | `md` | Escala dimensional do monograma, logo e tipografia. |
| `href` | `string|null` | `null` | Transforma o componente em link (`<a>`). |
| `navigate` | `bool` | `false` | Aplica `wire:navigate` automaticamente ao link. |
| `alt` | `string` | `label` ou `SampaUI` | Texto acessível para leitores de tela. |

## Slots

- `mark`: Substitui o monograma/logo por um SVG ou elemento customizado.
- `default`: Injeta markup customizado no lugar do `label`.

## Exemplos

### 1. Marca Padrão com Subtítulo e Link

```blade
<x-sampaui::brand-mark
    label="SampaUI"
    subtitle="Design System & UI Kit"
    href="/dashboard"
    navigate
/>
```

### 2. Com Badge de Versão ou Status

```blade
<x-sampaui::brand-mark
    label="Sampa Enterprise"
    subtitle="Portal Corporativo"
    badge="PRO"
    badge-variant="purple"
    size="lg"
/>
```

### 3. Layout Empilhado (Para Login ou Hero)

```blade
<x-sampaui::brand-mark
    label="SampaUI Studio"
    subtitle="Acesse sua conta para continuar"
    layout="vertical"
    size="xl"
/>
```

### 4. Logo Customizado

```blade
<x-sampaui::brand-mark
    logo="/images/empresa-logo.svg"
    label="Empresa Tecnologia"
    href="/"
/>
```

## Boas práticas

- Use `size="sm"` ou `size="md"` em sidebars e cabeçalhos fixos.
- Use `layout="vertical"` e `size="lg"` ou `size="xl"` no topo de formulários de autenticação ou landing pages.
- Quando usado como link com `href`, adicione `navigate` para transições instantâneas sem recarregar a página no Livewire.

