# Phone

Campo de telefone com mascara, icone Bootstrap e suporte direto a Livewire.

Campo de telefone com mascara, icone Bootstrap e suporte direto a Livewire. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::phone name="phone" label="Telefone" wire:model.live="phone" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `label` | `string|null` | `null` | Texto exibido acima do campo. |
| `name` | `string|null` | `null` | Nome do campo, id fallback e chave do ErrorBag. |
| `placeholder` | `string|null` | `mascara do componente` | Texto auxiliar exibido dentro do input. |
| `icon` | `string|null` | `icone do componente` | Nome Bootstrap Icons sem o prefixo `bi-`. |

## Slots

- `prefix`
- `suffix`

## Exemplos

```blade
<x-sampaui::phone name="phone" label="Telefone" wire:model.live="phone" />
```

## Boas práticas

- Formata telefone brasileiro internamente e sincroniza o model Alpine/Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
