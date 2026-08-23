# Currency BR

Campo monetario em reais com formatacao brasileira e prefixo customizavel.

Campo monetario em reais com formatacao brasileira e prefixo customizavel. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::currency-br name="price" label="Valor" wire:model.live="price" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `label` | `string|null` | `null` | Texto exibido acima do campo. |
| `name` | `string|null` | `null` | Nome do campo, id fallback e chave do ErrorBag. |
| `placeholder` | `string|null` | `mascara do componente` | Texto auxiliar exibido dentro do input. |
| `symbol` | `string` | `R$` | Símbolo monetário exibido no prefixo do campo. |
| `icon` | `string|null` | `icone do componente` | Nome Bootstrap Icons sem o prefixo `bi-`. |

## Slots

- `prefix`
- `suffix`

## Exemplos

```blade
<x-sampaui::currency-br name="price" label="Valor" wire:model.live="price" />
```

## Boas práticas

- Formata valores no padrao brasileiro e sincroniza o model Alpine/Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
