# Input

Campo textual com label opcional, mensagem de erro, estados desabilitados e passthrough total de atributos HTML/Livewire.

Indicado para formulários operacionais, autenticação e filtros. A borda padrão usa `border-secondary/20`; `wire:model` inicializa o campo e identifica automaticamente a chave do ErrorBag sem exigir `name`.

## Uso

```blade
<x-sampaui::input name="email" label="Email" icon="envelope" wire:model.live="email" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `type` | `string` | `text` | Aceita qualquer tipo suportado por `<input>`. |
| `label` | `string|null` | `null` | Renderiza `<label>` associado ao campo. |
| `name` | `string|null` | `null` | Usado para o atributo `name`; id e ErrorBag também podem ser derivados de `wire:model`. |
| `value` | `mixed` | `null` | Valor inicial opcional para uso sem Livewire. |
| `placeholder` | `string|null` | `null` | Texto auxiliar dentro do campo. |
| `hint` | `string|null` | `null` | Texto informativo auxiliar posicionado abaixo do componente. |
| `error` | `string|null` | `null` | Sobrescreve a mensagem automática do ErrorBag. |
| `state` | `valid|invalid|null` | `null` | Estado visual explícito de validação do campo. |
| `disabled` | `bool` | `false` | Aplica estilo inativo e atributo `disabled`. |
| `readonly` | `bool` | `false` | Bloqueia alteração mantendo o controle focalizável. |
| `loading` | `bool` | `false` | Exibe spinner ou estado de carregamento durante requisições. |
| `loading-target` | `string|null` | `null` | Ação do Livewire monitorada para feedback de loading (wire:target). |
| `required` | `bool` | `false` | Adiciona indicador de obrigatoriedade e validação nativa. |
| `icon` | `string|null` | `null` | Nome Bootstrap Icons sem o prefixo `bi-`, renderizado dentro do campo à esquerda. |
| `revealable` | `bool` | `true` | Em campos `type="password"`, renderiza o botão de mostrar/ocultar senha quando não há slot `suffix`. |
| `clearable` | `bool` | `false` | Exibe botão rápido para limpar o valor selecionado ou digitado. |
| `clear-label` | `string` | `Limpar` | Rótulo acessível do botão de limpar. |

## Slots

- `prefix`
- `suffix`

## Exemplos

```blade
<x-sampaui::input name="email" label="Email" icon="envelope" wire:model.live="email" />
```

## Boas práticas

- wire:model fica no input real e nao exige prop value.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
