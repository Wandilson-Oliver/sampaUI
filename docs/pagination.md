# Pagination

Paginacao para Laravel paginator ou controle manual, com modo simples e suporte a Livewire.

Use abaixo de tabelas e listagens. O componente aceita um paginator Laravel completo ou valores manuais para casos em Livewire e APIs customizadas.

## Uso

```blade
<x-sampaui::pagination :current-page="1" :last-page="8" wire-method="gotoPage" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `paginator` | `Paginator|null` | `null` | Quando informado, popula pagina atual, ultima pagina, total, perPage e URLs. |
| `current-page` | `int` | `1` | Pagina atual em modo manual. |
| `last-page` | `int` | `1` | Ultima pagina em modo manual. |
| `total` | `int|null` | `null` | Exibe resumo de registros quando informado. |
| `per-page` | `int|null` | `null` | Complementa o resumo com itens por pagina. |
| `previous-url` | `string|null` | `null` | URL da pagina anterior em modo manual. |
| `next-url` | `string|null` | `null` | URL da proxima pagina em modo manual. |
| `window` | `int` | `1` | Quantidade de paginas exibidas ao redor da atual. |
| `wire-method` | `string|null` | `null` | Renderiza botoes com `wire:click`, como `gotoPage(2)`. |
| `simple` | `bool` | `false` | Exibe apenas anterior/proxima. |
| `compact` | `bool` | `false` | Reduz o padding e tipografia das células. |

## Exemplos

```blade
<x-sampaui::pagination :current-page="1" :last-page="8" wire-method="gotoPage" />
```

## Boas práticas

- Pode chamar metodo Livewire definido em wire-method.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
