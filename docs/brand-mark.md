# Brand Mark

Marca compacta do SampaUI para sidebars, headers e estados de marca.

Marca compacta do SampaUI para sidebars, headers e estados de marca. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::brand-mark label="SampaUI" href="/" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `icon` | `string|null` | `null` | Nome do ícone Bootstrap Icons (sem o prefixo bi-). |
| `logo` | `string|null` | `null` | URL de arquivo SVG ou imagem de logotipo. |
| `alt` | `string` | `SampaUI` | Texto alternativo para acessibilidade. |
| `label` | `string|null` | `null` | Rótulo textual exibido acima ou ao lado do componente. |
| `href` | `string|null` | `null` | URL de destino para links de navegação. |
| `size` | `xs|sm|md|lg|xl` | `md` | Dimensão física e espaçamento interno do componente. |

## Exemplos

```blade
<x-sampaui::brand-mark label="SampaUI" href="/" />
```

## Boas práticas

- Aceita wire:navigate quando usado como link.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
