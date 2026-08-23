# DatePicker

Calendario de data apenas, sem hora, com label, min/max, erro, limpeza opcional e atributos Livewire.

Use para datas simples em formularios administrativos. O trigger usa texto neutro `text-slate-600`, com icone e valor na mesma cor; Alpine com `x-modelable` salva somente `YYYY-MM-DD` e recebe o estado de `wire:model` sem exigir a prop `value`. O calendario e teletransportado para o body com posicao fixa, evitando recorte em Modal, Drawer e containers com scroll.

## Uso

```blade
<x-sampaui::date-picker name="scheduled_at" label="Data" wire:model.live="scheduledAt" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `name` | `string|null` | `null` | Usado para `name`, `id` fallback e chave de erro. |
| `label` | `string|null` | `null` | Renderiza `<label>` associado ao campo. |
| `value` | `string|null` | `null` | Valor inicial opcional para uso sem Livewire, no formato `YYYY-MM-DD`. |
| `min` | `string|null` | `null` | Data minima selecionavel. |
| `max` | `string|null` | `null` | Data maxima selecionavel. |
| `placeholder` | `string|null` | `null` | Texto exibido quando nenhuma data foi selecionada. |
| `clearable` | `bool` | `false` | Exibe acao para limpar a data selecionada. `class` personaliza o trigger, inclusive cor, fundo, espacamento, largura, raio e sombra. |
| `disabled` | `bool` | `false` | Bloqueia o campo e reduz contraste. |
| `error` | `string|null` | `null` | Mensagem manual ou vinda do ErrorBag. |
| `required` | `bool` | `false` | Marca o input real como obrigatorio para formularios e validacao. |

## Exemplos

```blade
<x-sampaui::date-picker name="scheduled_at" label="Data" wire:model.live="scheduledAt" />
```

## Boas práticas

- Usa x-modelable e preserva wire:model; o calendario e teletransportado para o body com posicao fixa, evitando recorte em Modal, Drawer e containers com scroll.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
