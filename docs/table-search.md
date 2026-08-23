# Table Search

DataTable premium unificada com busca, ordenação, paginação, seleção, exportação, loading e empty state.

Alias 100% consistente com o componente Table unificado. Compartilha exatamente as mesmas props, slots, eventos e capacidades de busca, paginação e seleção.

## Uso

```blade
<x-sampaui::table-search title="Clientes" search-model="search" :columns="$columns" :rows="$rows" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `columns` | `array` | `[]` | Mapa `chave => label` ou arrays com `label`, `key` e `align`. |
| `rows` | `array` | `[]` | Linhas em array ou objeto lidas por `data_get`. |
| `title` | `string|null` | `null` | Título opcional da toolbar. |
| `description` | `string|null` | `null` | Descrição curta abaixo do título. |
| `empty` | `string` | `Nenhum registro encontrado.` | Mensagem exibida quando nao ha linhas. |
| `empty-title` | `string` | `Nenhum registro encontrado` | Título do estado vazio premium. |
| `empty-description` | `string|null` | `null` | Descrição do estado vazio. |
| `empty-icon` | `string` | `inbox` | Ícone Bootstrap Icons do estado vazio. |
| `striped` | `bool` | `false` | Alterna fundo discreto em linhas pares. |
| `hover` | `bool` | `true` | Ativa destaque ao passar o mouse nas linhas. |
| `sort-by` | `string|null` | `null` | Chave da coluna ordenada quando a coluna tem `sortable => true`. |
| `sort-direction` | `asc|desc` | `asc` | Direcao ativa da ordenacao. |
| `sort-method` | `string|null` | `null` | Metodo Livewire chamado nos botoes de ordenacao. |
| `search` | `string|null` | `null` | Valor atual do termo pesquisado. |
| `search-name` | `string` | `search` | Nome do input de busca. |
| `search-model` | `string|null` | `null` | Quando informado, aplica `wire:model.live.debounce.300ms` ao campo de busca. |
| `search-placeholder` | `string` | `Buscar...` | Texto de busca do campo de filtro embutido. |
| `per-page` | `int|null` | `null` | Quantidade de registros exibidos por página. |
| `page` | `int` | `1` | Número da página atual. |
| `total` | `int|null` | `null` | Total geral de registros para cálculo de páginas. |
| `pagination-method` | `string|null` | `null` | Método Livewire chamado ao navegar entre páginas. |
| `pagination-type` | `numbered|simple` | `numbered` | Estilo dos controles de paginação. |
| `selectable` | `bool` | `false` | Ativa seleção múltipla local com Alpine. |
| `selected-rows` | `array` | `[]` | IDs selecionados inicialmente. |
| `select-name` | `string` | `selected` | Nome do campo de seleção de linhas. |
| `row-key` | `string` | `id` | Chave usada como value dos checkboxes. |
| `export-href` | `string|null` | `null` | Link para exportação CSV ou endpoint próprio. Export Excel segue planejado no roadmap. |
| `export-label` | `string` | `Exportar` | Rótulo textual do botão de exportação. |
| `sticky-header` | `bool` | `false` | Fixa o cabeçalho no topo durante a rolagem. |
| `mobile-cards` | `bool` | `false` | Converte as linhas da tabela em cards elegantes no mobile. |
| `compact` | `bool` | `false` | Reduz padding das celulas. |
| `bordered` | `bool` | `true` | Controla borda externa da tabela. |
| `flush` | `bool` | `false` | Remove bordas externas para embutir perfeitamente em Cards. |
| `bleed` | `bool` | `false` | Estende a tabela até as margens do container. |
| `loading` | `bool` | `false` | Renderiza skeletons e marca `aria-busy`. |
| `loading-target` | `string|null` | `null` | Ação do Livewire monitorada para feedback de loading (wire:target). |

## Slots

- `toolbar`
- `filters`
- `actions`
- `selectionActions`
- `emptyAction`
- `head`
- `body`
- `pagination`

## Exemplos

```blade
<x-sampaui::table-search title="Clientes" search-model="search" :columns="$columns" :rows="$rows" />
```

## Boas práticas

- Alias direto para o componente Table unificado com searchable ativado por padrao.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
