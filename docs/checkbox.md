# Checkbox

Controle booleano com label opcional, suporte a slot e integracao direta com validacao.

Use em consentimentos, flags operacionais e configuracoes binarias. O componente usa `border-secondary/40`; em grupos, combina model/nome e valor para manter ids e labels unicos.

## Uso

```blade
<x-sampaui::checkbox name="terms" label="Aceito os termos" wire:model="terms" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `name` | `string|null` | `null` | Usado como `name`, `id` fallback e chave de erro. |
| `label` | `string|null` | `null` | Texto visivel ao lado do controle. |
| `value` | `string` | `1` | Valor enviado quando marcado. |
| `checked` | `bool` | `false` | Marca o controle na renderizacao inicial. |
| `disabled` | `bool` | `false` | Desabilita a interacao e reduz contraste. |
| `readonly` | `bool` | `false` | Bloqueia alteração mantendo o controle focalizável. |
| `loading` | `bool` | `false` | Exibe spinner ou estado de carregamento durante requisições. |
| `loading-target` | `string|null` | `null` | Ação do Livewire monitorada para feedback de loading (wire:target). |
| `required` | `bool` | `false` | Adiciona indicador de obrigatoriedade e validação nativa. |
| `hint` | `string|null` | `null` | Texto informativo auxiliar posicionado abaixo do componente. |
| `error` | `string|null` | `null` | Mensagem manual ou vinda do ErrorBag. |
| `state` | `valid|invalid|null` | `null` | Estado visual explícito de validação do campo. |
| `color` | `primary|secondary|accent|danger|success|warning|info|purple|muted|light` | `primary` | Define a cor do controle marcado usando os tokens oficiais. |

## Slots

- `default`

## Exemplos

```blade
<x-sampaui::checkbox name="terms" label="Aceito os termos" wire:model="terms" />
```

## Boas práticas

- Use wire:model diretamente no input real.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
