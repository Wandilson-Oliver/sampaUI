# Tab Panel

Subcomponente de painel para conteudo renderizado dentro de Tabs.

Subcomponente de painel para conteudo renderizado dentro de Tabs. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::tab-panel name="details">Detalhes</x-sampaui::tab-panel>
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `name` | `string|null` | `null` | Nome do campo no formulário e chave vinculada ao ErrorBag. |

## Slots

- `default`

## Exemplos

```blade
<x-sampaui::tab-panel name="details">Detalhes</x-sampaui::tab-panel>
```

## Boas práticas

- Conteudo interno pode ser Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
