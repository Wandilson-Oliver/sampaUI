# Textarea

Campo de texto multilinha avançado com auto-redimensionamento dinâmico (auto-resize), contador de caracteres em tempo real e suporte completo ao Livewire e Alpine.

Ideal para observações de atendimento, redação de mensagens, descrições de produtos e campos de formulário extensos. Possui redimensionamento automático via Alpine.js, contagem progressiva/regressiva de caracteres, botão de limpeza rápida (clearable) e estilização refinada com dark mode.

## Uso

```blade
<x-sampaui::textarea name="notes" label="Observacoes" auto-resize counter maxlength="500" wire:model.live="notes" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `label` | `string|null` | `null` | Legenda visual do campo de texto. |
| `name` | `string|null` | `null` | Atributo `name`, fallback de `id` e vinculação ao ErrorBag. |
| `value` | `string|null` | `null` | Valor textual inicial (também aceita conteúdo via `$slot`). |
| `rows` | `int|string` | `4` | Quantidade de linhas visíveis iniciais do campo. |
| `min-rows` | `int|string|null` | `null` | Quantidade mínima de linhas visíveis. |
| `max-rows` | `int|string|null` | `null` | Limite máximo de linhas para expansão no auto-resize antes de rolar. |
| `placeholder` | `string|null` | `null` | Texto de orientação quando o campo está vazio. |
| `hint` | `string|null` | `null` | Instrução ou texto de apoio abaixo do rótulo. |
| `error` | `string|null` | `null` | Mensagem de erro de validação manual ou vinda da ErrorBag. |
| `state` | `valid|invalid|null` | `null` | Estado visual explícito de validação do campo. |
| `disabled` | `bool` | `false` | Desabilita interação e aplica opacidade de bloqueio. |
| `readonly` | `bool` | `false` | Impede edição mantendo o texto selecionável. |
| `loading` | `bool` | `false` | Aplica estado de carregamento e `aria-busy`. |
| `loading-target` | `string|null` | `null` | Alvo de ação assíncrona para desabilitar via `wire:loading`. |
| `required` | `bool` | `false` | Marca campo como obrigatório com asterisco vermelho. |
| `auto-resize` | `bool` | `false` | Ajusta automaticamente a altura conforme o usuário digita. |
| `counter` | `bool` | `false` | Exibe contador de caracteres em tempo real. |
| `maxlength` | `int|string|null` | `null` | Limite máximo de caracteres com exibição no formato `atual / max`. |
| `clearable` | `bool` | `false` | Exibe botão para limpar todo o conteúdo em 1 clique. |
| `clear-label` | `string` | `'Limpar'` | Texto do botão de limpeza rápida. |
| `copyable` | `bool` | `false` | Exibe botão para copiar o texto do campo para a área de transferência. |
| `copy-label` | `string` | `'Copiar'` | Texto do botão de cópia rápida. |
| `resize` | `string` | `'vertical'` | Direção de redimensionamento manual ('vertical', 'none', 'both', 'horizontal'). |

## Exemplos

```blade
<x-sampaui::textarea name="notes" label="Observacoes" auto-resize counter maxlength="500" wire:model.live="notes" />
```

## Boas práticas

- Textarea reativo com suporte a auto-resize, contador de caracteres, botao de copiar e binding direto Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
