# Toast

Central de notificacoes Alpine acionada por evento `toast`, com fila, auto-dismiss e progresso visual.

Use uma vez no layout da aplicacao para exibir feedback temporario vindo de JavaScript, Alpine ou eventos disparados apos acoes Livewire.

## Uso

```blade
<x-sampaui::toast />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `position` | `top-right|top-left|bottom-right|bottom-left` | `top-right` | Define onde a fila aparece na viewport. |
| `max` | `int` | `5` | Quantidade maxima de toasts simultaneos. |
| `duration` | `int` | `4000` | Duração em milissegundos antes de ocultar automaticamente. |
| `variant` | `string` | `primary` | Variante de cor e tema semântico do componente. |
| `size` | `xs|sm|md|lg|xl` | `md` | Dimensão física e espaçamento interno do componente. |

## Exemplos

```blade
<x-sampaui::toast />
```

## Boas práticas

- Dispare CustomEvent("toast") pelo browser a partir de acoes Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
