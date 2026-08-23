# Alert

Mensagem contextual com icone, titulo opcional, role acessivel e variantes nos tokens oficiais.

Use para feedback persistente em formularios, avisos operacionais e estados de sistema que precisam ficar no fluxo da pagina.

## Uso

```blade
<x-sampaui::alert variant="success" title="Salvo">Alteracoes publicadas.</x-sampaui::alert>
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `variant` | `success|danger|error|warning|info` | `info` | Define cor, icone padrao e role inicial. |
| `type` | `string|null` | `null` | Alias de compatibilidade para `variant`. |
| `title` | `string|null` | `null` | Titulo curto acima da mensagem. |
| `icon` | `string|false|null` | `null` | Nome do Bootstrap Icon sem `bi-`; `false` remove o icone. |
| `role` | `string|null` | `null` | Sobrescreve `status` ou `alert` quando necessario. |

## Slots

- `default`

## Exemplos

```blade
<x-sampaui::alert variant="success" title="Salvo">Alteracoes publicadas.</x-sampaui::alert>
```

## Boas práticas

- Pode ser exibido condicionalmente por estado Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
