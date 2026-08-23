# Toggle

Controle booleano colorido para preferencias e configuracoes.

Controle booleano colorido para preferencias e configuracoes. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::toggle name="active" label="Ativo" color="accent" wire:model="active" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `name` | `string|null` | `null` | Nome e id fallback do input checkbox. |
| `label` | `string|null` | `null` | Texto exibido ao lado do controle. |
| `checked` | `bool` | `false` | Estado inicial ligado. |
| `disabled` | `bool` | `false` | Desabilita a interacao. |
| `readonly` | `bool` | `false` | Bloqueia alteração mantendo o controle focalizável. |
| `loading` | `bool` | `false` | Exibe spinner ou estado de carregamento durante requisições. |
| `loading-target` | `string|null` | `null` | Ação do Livewire monitorada para feedback de loading (wire:target). |
| `required` | `bool` | `false` | Adiciona indicador de obrigatoriedade e validação nativa. |
| `hint` | `string|null` | `null` | Texto informativo auxiliar posicionado abaixo do componente. |
| `error` | `string|null` | `null` | Mensagem customizada de erro de validação. |
| `state` | `valid|invalid|null` | `null` | Estado visual explícito de validação do campo. |
| `value` | `string` | `1` | Valor enviado quando marcado. |
| `color` | `primary|secondary|accent|danger|success|warning|info|purple|muted|light` | `primary` | Cor do controle quando marcado. |

## Exemplos

```blade
<x-sampaui::toggle name="active" label="Ativo" color="accent" wire:model="active" />
```

## Boas práticas

- wire:model fica no checkbox real.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
