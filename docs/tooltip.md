# Tooltip

Ajuda contextual para botoes, icones e acoes compactas.

Ajuda contextual para botoes, icones e acoes compactas. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::tooltip text="Ajuda"><x-sampaui::button icon="question" /></x-sampaui::tooltip>
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `text` | `string|null` | `null` | Conteudo textual do tooltip. |
| `position` | `top|right|bottom|left` | `top` | Posicao em relacao ao elemento alvo. |

## Slots

- `default`

## Exemplos

```blade
<x-sampaui::tooltip text="Ajuda"><x-sampaui::button icon="question" /></x-sampaui::tooltip>
```

## Boas práticas

- Componente visual, seguro em re-renderizacoes.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
