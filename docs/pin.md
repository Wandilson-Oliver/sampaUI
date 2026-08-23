# Pin

Campo de PIN para codigos curtos, 2FA, prefixo, limpeza, mascaras e envio inteligente.

Use em confirmacoes por email, SMS, login em duas etapas e codigos de recuperacao. O componente exibe caixas individuais, mas mantem um valor unico em input hidden e sincroniza com Livewire via `x-modelable`.

## Uso

```blade
<x-sampaui::pin name="code" label="Codigo" length="6" numbers wire:model.live="code" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `name` | `string|null` | `null` | Usado como `name`, `id` fallback, ErrorBag e payload do formulario. |
| `label` | `string|null` | `null` | Texto visivel associado ao grupo de campos. |
| `hint` | `string|null` | `null` | Texto auxiliar exibido abaixo do label. |
| `value` | `string` | `''` | Valor inicial sem Livewire. |
| `length` | `int|string` | `4` | Quantidade de caixas do PIN. |
| `prefix` | `string|null` | `null` | Prefixo visual antes das caixas, como `G-`. |
| `numbers` | `bool` | `false` | Aceita somente numeros. |
| `letters` | `bool` | `false` | Aceita somente letras. |
| `clear` | `bool` | `false` | Exibe botao de limpar quando existe valor. |
| `smart` | `bool` | `false` | Envia o formulario pai uma vez quando o PIN fica completo. |
| `disabled` | `bool` | `false` | Bloqueia todas as caixas e reduz contraste. |
| `error` | `string|null` | `null` | Mensagem manual ou fallback do ErrorBag. |
| `required` | `bool` | `false` | Aplica `required` ao input hidden. |

## Exemplos

```blade
<x-sampaui::pin name="code" label="Codigo" length="6" numbers wire:model.live="code" />
```

## Boas práticas

- Suporta x-modelable e sincronizacao bidirecional com Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
