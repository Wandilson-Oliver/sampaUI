# Field

Wrapper estrutural para label, hint, erro, indicador obrigatório e slot de controle.

Wrapper estrutural; mantenha wire:model no controle real dentro do slot.

## Uso

```blade
<x-sampaui::field id="email" label="Email" hint="Use seu email profissional"><input id="email" /></x-sampaui::field>
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `id` | `string|null` | `null` | Identificador único no DOM. |
| `label-for` | `string|null` | `null` | ID do elemento associado para acessibilidade. |
| `label` | `string|null` | `null` | Rótulo textual exibido acima ou ao lado do componente. |
| `hint` | `string|null` | `null` | Texto informativo auxiliar posicionado abaixo do componente. |
| `error` | `string|null` | `null` | Mensagem customizada de erro de validação. |
| `required` | `bool` | `false` | Adiciona indicador de obrigatoriedade e validação nativa. |

## Slots

- `default`

## Exemplos

```blade
<x-sampaui::field id="email" label="Email" hint="Use seu email profissional"><input id="email" /></x-sampaui::field>
```

## Boas práticas

- Wrapper estrutural; mantenha wire:model no controle real dentro do slot.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
