# Card

Container com header, descricao, actions, footer e variantes discretas para superficies de conteudo.

Use para agrupar dados operacionais, formularios curtos e blocos de resumo sem recriar sombra e espacamento. Quando existe header, o conteudo inicia 15px abaixo dele; dropdowns absolutos abrem integralmente porque o overflow e visivel por padrao.

## Uso

```blade
<x-sampaui::card title="Resumo">Conteudo do card.</x-sampaui::card>
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `title` | `string|null` | `null` | Titulo padrao do header. |
| `description` | `string|null` | `null` | Texto auxiliar abaixo do titulo. |
| `variant` | `default|muted|primary|secondary|accent|danger|success|warning|info|purple` | `default` | Define a superficie e a cor de borda com tokens oficiais. |
| `appearance` | `string` | `subtle` | Estilo visual de preenchimento e superfície. |
| `padding` | `none|sm|md|lg` | `md` | Controla espacamento interno do header, body e footer. Use `none` para remover padding (`p-0`). |
| `divided` | `bool` | `false` | Exibe divisor entre header e body quando ativado. |
| `overflow` | `visible|hidden|auto` | `visible` | Padrao seguro para dropdowns, DatePicker e popovers absolutos. Use `hidden` para recorte intencional; `auto` cria rolagem interna. |

## Slots

- `default`
- `footer`
- `actions`

## Exemplos

```blade
<x-sampaui::card title="Resumo">Conteudo do card.</x-sampaui::card>
```

## Boas práticas

- Superficie segura para conteudo reativo renderizado pelo Livewire, com overflow visivel por padrao para menus e calendarios.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
