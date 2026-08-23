# Select

Select com combobox Alpine, dropdown customizado, placeholder, erro e sombra forte na listagem.

Bom para formularios administrativos e filtros curtos. O painel e teletransportado para o body com IDs estaveis, acompanha o trigger e abre acima quando necessario, evitando corte em Modal, Drawer e Card com scroll.

## Uso

```blade
<x-sampaui::select name="status" label="Status" :options="['active' => 'Ativo']" wire:model.live="status" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `name` | `string|null` | `null` | Usado como atributo `name`; id e erro tambem podem ser derivados de `wire:model`. |
| `label` | `string|null` | `null` | Renderiza `<label>` associado. |
| `value` | `string|int|null` | `null` | Valor inicial selecionado. |
| `options` | `array` | `[]` | Aceita `valor => label` ou arrays com `value`, `label` e `disabled`. |
| `placeholder` | `string|null` | `null` | Texto exibido antes de selecionar uma opcao. |
| `empty-text` | `string` | `Nenhuma opcao encontrada.` | Mensagem quando nao ha opcoes. |
| `hint` | `string|null` | `null` | Texto informativo auxiliar posicionado abaixo do componente. |
| `error` | `string|null` | `null` | Mensagem de erro manual ou fallback do ErrorBag. |
| `state` | `valid|invalid|null` | `null` | Estado visual explícito de validação do campo. |
| `disabled` | `bool` | `false` | Desliga interacao e reduz opacidade. |
| `readonly` | `bool` | `false` | Bloqueia alteração mantendo o controle focalizável. |
| `loading` | `bool` | `false` | Exibe spinner ou estado de carregamento durante requisições. |
| `loading-target` | `string|null` | `null` | Ação do Livewire monitorada para feedback de loading (wire:target). |
| `required` | `bool` | `false` | Aplica `required` ao select real. |
| `clearable` | `bool` | `false` | Exibe botão rápido para limpar o valor selecionado ou digitado. |
| `clear-label` | `string` | `Limpar` | Rótulo acessível do botão de limpar. |

## Slots

- `default`
- `prefix`
- `suffix`

## Exemplos

```blade
<x-sampaui::select name="status" label="Status" :options="['active' => 'Ativo']" wire:model.live="status" />
```

## Boas práticas

- Usa x-modelable para manter valor e label sincronizados quando o servidor atualiza wire:model.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
