# Breadcrumb

Trilha de navegacao para paginas internas.

Trilha de navegacao para paginas internas. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::breadcrumb :items="$items" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `items` | `array` | `[]` | Lista de itens ou opções estruturadas em array. |

## Exemplos

```blade
<x-sampaui::breadcrumb :items="$items" />
```

## Boas práticas

- Links podem usar wire:navigate nos itens.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
