# Select múltiplo

Select multiplo com busca local, tags removiveis, estados visuais e sincronizacao pelo `<select multiple>` nativo.

Use quando o usuario precisa escolher varias opcoes de uma lista local. O painel teletransportado usa IDs estaveis e acompanha o trigger em scroll/resize, evitando corte em Modal e Drawer; tags, busca e Esc permanecem disponiveis.

## Uso

```blade
<x-sampaui::select-multiple name="roles" label="Perfis" :options="$roles" wire:model.live="roles" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `name` | `string|null` | `null` | Usado como `name[]`, `id` fallback, chave de erro e payload do evento. |
| `label` | `string|null` | `null` | Renderiza `<label>` associado ao botao do combobox. |
| `placeholder` | `string` | `Selecione` | Texto exibido antes de selecionar opcoes. |
| `options` | `array` | `[]` | Aceita `valor => label` ou arrays com `value`, `label` e `disabled`. |
| `value` | `array|string|null` | `[]` | Valores iniciais selecionados. |
| `search-placeholder` | `string` | `Buscar...` | Placeholder do campo de busca interno. |
| `empty-text` | `string` | `Nenhum resultado encontrado.` | Mensagem quando a busca nao encontra opcoes. |
| `loading-text` | `string` | `Carregando opcoes...` | Mensagem do estado loading. |
| `disabled` | `bool` | `false` | Bloqueia interacao e reduz contraste. |
| `readonly` | `bool` | `false` | Bloqueia alteração mantendo o controle focalizável. |
| `loading` | `bool` | `false` | Exibe spinner e bloqueia interacao enquanto carrega. |
| `loading-target` | `string|null` | `null` | Ação do Livewire monitorada para feedback de loading (wire:target). |
| `hint` | `string|null` | `null` | Texto informativo auxiliar posicionado abaixo do componente. |
| `error` | `string|null` | `null` | Mensagem manual ou fallback do ErrorBag. |
| `state` | `valid|invalid|null` | `null` | Estado visual explícito de validação do campo. |
| `required` | `bool` | `false` | Aplica `required` ao `<select multiple>` real. |
| `clearable` | `bool` | `false` | Exibe botão rápido para limpar o valor selecionado ou digitado. |
| `clear-label` | `string` | `Limpar` | Rótulo acessível do botão de limpar. |

## Slots

- `prefix`
- `suffix`

## Exemplos

```blade
<x-sampaui::select-multiple name="roles" label="Perfis" :options="$roles" wire:model.live="roles" />
```

## Boas práticas

- Sincroniza array de valores com Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
