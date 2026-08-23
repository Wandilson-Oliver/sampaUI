# Accordion

Lista expansivel para perguntas, detalhes e configuracoes.

Lista expansivel para perguntas, detalhes e configuracoes. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::accordion :items="$items" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `items` | `array` | `[]` | Lista de itens ou opções estruturadas em array. |
| `multiple` | `bool` | `false` | Permite a seleção ou abertura de múltiplos itens simultaneamente. |

## Slots

- `default`

## Exemplos

```blade
<x-sampaui::accordion :items="$items" />
```

## Boas práticas

- Preserva atributos wire:* no elemento raiz.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
