# Select com busca

Select pesquisavel com busca local, opcoes via array e sincronizacao por input hidden para formularios e Livewire.

Use quando a lista de opcoes e maior que um select simples, mas ainda pequena o suficiente para busca local no navegador. O painel usa teleport com IDs estaveis, acompanha o trigger e foca a busca ao abrir, sem ser cortado por overlays com scroll.

## Uso

```blade
<x-sampaui::select-search name="owner" label="Responsavel" :options="$owners" wire:model.live="owner" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `name` | `string|null` | `null` | Usado como `name`, `id` fallback, chave de erro e payload do evento. |
| `label` | `string|null` | `null` | Renderiza `<label>` associado ao botao do combobox. |
| `placeholder` | `string` | `Selecione` | Texto exibido antes de selecionar uma opcao. |
| `options` | `array` | `[]` | Aceita `valor => label` ou arrays com `value` e `label`. |
| `value` | `string|int|null` | `null` | Valor inicial selecionado. |
| `search-placeholder` | `string` | `Buscar...` | Placeholder do campo de busca interno. |
| `empty-text` | `string` | `Nenhum resultado encontrado.` | Mensagem quando a busca nao encontra opcoes. |
| `disabled` | `bool` | `false` | Bloqueia interacao e reduz contraste. |
| `error` | `string|null` | `null` | Mensagem manual ou fallback do ErrorBag. |
| `required` | `bool` | `false` | Aplica `required` ao input hidden para formularios nativos. |

## Exemplos

```blade
<x-sampaui::select-search name="owner" label="Responsavel" :options="$owners" wire:model.live="owner" />
```

## Boas práticas

- Usa x-modelable e preserva wire:model para busca local.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
