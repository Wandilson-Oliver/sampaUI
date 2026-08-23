# Dropdown Item

Subcomponente de item acionavel para menus Dropdown.

Subcomponente de item acionavel para menus Dropdown. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::dropdown-item icon="pencil" wire:click="edit">Editar</x-sampaui::dropdown-item>
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `href` | `string|null` | `null` | URL de destino para links de navegação. |
| `icon` | `string|null` | `null` | Nome do ícone Bootstrap Icons (sem o prefixo bi-). |
| `danger` | `bool` | `false` | Aplica estilo visual de ação destrutiva (vermelho). |
| `disabled` | `bool` | `false` | Desabilita a interação e aplica estilo desativado. |

## Slots

- `default`

## Exemplos

```blade
<x-sampaui::dropdown-item icon="pencil" wire:click="edit">Editar</x-sampaui::dropdown-item>
```

## Boas práticas

- Preserva wire:click no item interativo.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
