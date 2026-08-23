# Estado vazio

Estado vazio com icone, descricao e slot de acoes.

Estado vazio com icone, descricao e slot de acoes. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::empty-state title="Nada encontrado" icon="inbox" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `title` | `string|null` | `null` | Título principal exibido no cabeçalho. |
| `description` | `string|null` | `null` | Descrição explicativa do conteúdo. |
| `icon` | `string|null` | `null` | Nome do ícone Bootstrap Icons (sem o prefixo bi-). |

## Slots

- `default`
- `actions`

## Exemplos

```blade
<x-sampaui::empty-state title="Nada encontrado" icon="inbox" />
```

## Boas práticas

- Use em estados condicionais de listas Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
