# Modal

Dialog Livewire com entangle, backdrop, header, actions e fechamento por evento.

Use para formularios curtos, confirmacoes e fluxos que precisam interromper a pagina sem sair do contexto. O painel usa camada dinamica a partir de 200, permitindo menus do modal ativo e modais aninhados sem z-index maximo.

## Uso

```blade
<x-sampaui::modal model="confirmOpen" title="Confirmar">Conteudo</x-sampaui::modal>
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `model` | `string` | `null` | Nome da propriedade booleana Livewire usada por `@entangle(...).live`. |
| `title` | `string|null` | `null` | Titulo padrao do header. |
| `subtitle` | `string|null` | `null` | Texto auxiliar associado por `aria-describedby`. |
| `size` | `sm|md|lg|xl|2xl|4xl|5xl|6xl|7xl|full` | `lg` | Controla a largura maxima do painel. |
| `variant` | `default|primary|secondary|accent|danger|success|warning|info|purple|muted` | `default` | Define a cor de borda do painel. |
| `persistent` | `bool` | `false` | Impede fechamento por ESC ou clique no backdrop. |
| `close-on-escape` | `bool` | `true` | Fecha o overlay ao pressionar a tecla Escape. |
| `close-on-outside` | `bool` | `true` | Fecha o overlay ao clicar fora da área principal. |
| `close-button` | `bool` | `true` | Exibe ou remove o botao de fechar no header. |
| `close-event` | `string|null` | `null` | Evento browser que fecha o modal, como `customer-saved`. |
| `after-close` | `string|null` | `null` | Metodo Livewire chamado apos a animacao de fechamento. |
| `panel-class` | `string|null` | `null` | Classes extras aplicadas ao painel interno, uteis para trocar ou remover a borda. |
| `backdrop-class` | `string|null` | `null` | Classes Tailwind para customizar o fundo escurecido (backdrop), ex: `bg-black/50` ou `bg-slate-900/40`. |

## Slots

- `default`
- `header`
- `actions`

## Exemplos

```blade
<x-sampaui::modal model="confirmOpen" title="Confirmar">Conteudo</x-sampaui::modal>
```

## Boas práticas

- Controle abertura com uma propriedade booleana Livewire informada em model.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
