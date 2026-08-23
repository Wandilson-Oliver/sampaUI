# Badge

Marcadores compactos para status, tags e classificacoes.

Marcadores compactos para status, tags e classificacoes. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::badge variant="accent">Novo</x-sampaui::badge>
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `variant` | `primary|secondary|accent|danger|success|warning|info|purple|muted|light` | `primary` | Define cor semantica. Variantes invalidas retornam para `primary`. |
| `appearance` | `string` | `subtle` | Estilo visual de preenchimento e superfície. |
| `size` | `xs|sm|md|lg` | `md` | Controla padding, gap, tipografia e altura de linha. |
| `icon` | `string|null` | `null` | Nome Bootstrap Icons sem o prefixo `bi-`. |
| `rounded` | `bool` | `true` | Usa `rounded-full`; quando false usa `rounded-default`. |

## Slots

- `default`

## Exemplos

```blade
<x-sampaui::badge variant="accent">Novo</x-sampaui::badge>
```

## Boas práticas

- Pode receber textos e estados calculados pelo Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
