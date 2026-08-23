# Radio

Grupo de opcoes exclusivas com cores oficiais, suporte a array de opcoes, slot e atributos Livewire.

Use quando o usuario precisa escolher exatamente uma opcao em um conjunto curto. Cada controle usa `border-secondary/40`, e o componente resolve label, ids, estado selecionado, erro visual e atributos Livewire.

## Uso

```blade
<x-sampaui::radio name="status" :options="['active' => 'Ativo']" wire:model="status" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `name` | `string|null` | `null` | Usado como `name`, base de `id` e chave de erro. |
| `label` | `string|null` | `null` | Renderiza a legenda do fieldset. |
| `value` | `string|int|null` | `null` | Valor selecionado inicialmente. |
| `options` | `array` | `[]` | Aceita `valor => label` ou arrays com `value`, `label` e `disabled`. |
| `inline` | `bool` | `false` | Alinha as opcoes na horizontal. |
| `error` | `string|null` | `null` | Mensagem manual ou vinda do ErrorBag. |
| `disabled` | `bool` | `false` | Desabilita todas as opcoes. |
| `color` | `primary|secondary|accent|danger|success|warning|info|purple|muted|light` | `primary` | Define cor do controle marcado. |

## Exemplos

```blade
<x-sampaui::radio name="status" :options="['active' => 'Ativo']" wire:model="status" />
```

## Boas práticas

- Use wire:model para vincular a opcao selecionada.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
