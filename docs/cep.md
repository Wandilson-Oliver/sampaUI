# CEP

Campo de CEP com mascara `99999-999`, autocomplete postal e suporte direto a Livewire.

Campo de CEP com mascara `99999-999`, autocomplete postal e suporte direto a Livewire. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::cep name="postal_code" label="CEP" wire:model.live="postal_code" />
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
<x-sampaui::cep name="postal_code" label="CEP" wire:model.live="postal_code" />
```

## Boas práticas

- Formata internamente 12345678 como 12345-678 e nao depende de plugin externo de mascara.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
