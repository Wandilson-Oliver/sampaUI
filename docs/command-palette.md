# Command Palette

Busca global acionada por evento Alpine para comandos e atalhos.

Use Command Palette para busca global, atalhos e navegacao rapida em dashboards. O componente recebe uma lista de comandos e abre por evento Alpine ou JavaScript.

## Uso

```blade
<x-sampaui::command-palette :items="$items" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `items` | `array` | `[]` | Lista de comandos com `label`, `href` e `icon` opcional. |
| `placeholder` | `string` | `Buscar comando...` | Texto exibido no campo de busca interno. |
| `open-event` | `string` | `sampaui:command-open` | Nome do evento escutado em `window` para abrir a paleta. |

## Exemplos

```blade
<x-sampaui::command-palette :items="$items" />
```

## Boas práticas

- Pode disparar navegacao ou acoes via eventos do browser.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
