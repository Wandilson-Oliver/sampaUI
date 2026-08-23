# Progress

Barra de progresso com label, percentual e variantes.

Barra de progresso com label, percentual e variantes. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::progress value="60" variant="primary" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `value` | `int|float` | `0` | Valor atual. |
| `max` | `int|float` | `100` | Valor maximo usado para calcular percentual. |
| `variant` | `primary|secondary|accent|danger|success|warning|info|purple|muted|light` | `primary` | Cor da barra. |
| `label` | `string|null` | `null` | Texto acima da barra. |
| `show-value` | `bool` | `false` | Exibe percentual calculado. |

## Exemplos

```blade
<x-sampaui::progress value="60" variant="primary" />
```

## Boas práticas

- Valor pode ser atualizado por propriedades Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
