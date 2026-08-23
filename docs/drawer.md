# Drawer

Painel lateral ou vertical com Livewire entangle, backdrop, header, actions e transicao suave.

Use para filtros, formularios auxiliares, detalhes de registro e fluxos secundarios sem tirar o usuario da tela atual. O painel usa camada dinamica e preserva o scroll interno sem cortar selects teletransportados.

## Uso

```blade
<x-sampaui::drawer model="filtersOpen" title="Filtros">Conteudo</x-sampaui::drawer>
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `model` | `string` | `null` | Nome da propriedade booleana Livewire usada por `@entangle(...).live`. |
| `title` | `string|null` | `null` | Titulo padrao do header. |
| `subtitle` | `string|null` | `null` | Texto auxiliar associado por `aria-describedby`. |
| `placement` | `right|left|top|bottom` | `right` | Define de qual borda o painel entra. |
| `size` | `sm|md|lg|xl|2xl|full` | `md` | Controla largura em drawers laterais e altura em drawers superior/inferior. |
| `variant` | `default|primary|secondary|accent|danger|success|warning|info|purple|muted` | `default` | Define a cor de borda do painel. |
| `persistent` | `bool` | `false` | Impede fechamento por ESC ou clique no backdrop. |
| `close-on-escape` | `bool` | `true` | Fecha o overlay ao pressionar a tecla Escape. |
| `close-on-outside` | `bool` | `true` | Fecha o overlay ao clicar fora da área principal. |
| `close-button` | `bool` | `true` | Exibe ou remove o botao de fechar no header. |
| `close-event` | `string|null` | `null` | Evento browser que fecha o drawer, como `filters-applied`. |
| `after-close` | `string|null` | `null` | Metodo Livewire chamado apos a animacao de fechamento. |
| `panel-class` | `string|null` | `null` | Classes extras aplicadas ao painel interno, uteis para trocar ou remover a borda. |
| `backdrop-class` | `string|null` | `null` | Classes Tailwind para customizar o fundo escurecido (backdrop), ex: `bg-black/50` ou `bg-slate-900/40`. |

## Slots

- `default`
- `header`
- `actions`

## Exemplos

```blade
<x-sampaui::drawer model="filtersOpen" title="Filtros">Conteudo</x-sampaui::drawer>
```

## Boas práticas

- Controle abertura com uma propriedade booleana Livewire informada em model.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
