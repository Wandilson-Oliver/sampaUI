# Tabs

Navegacao local entre secoes do mesmo contexto.

Navegacao local entre secoes do mesmo contexto. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::tabs :tabs="$tabs" active="overview" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `tabs` | `array` | `[]` | Abas disponíveis [ chave => Rótulo ]. |
| `active` | `string|null` | `null` | Identificador da aba inicialmente ativa. |

## Slots

- `default`

## Exemplos

```blade
<x-sampaui::tabs :tabs="$tabs" active="overview" />
```

## Boas práticas

- Pode controlar a aba ativa via estado Alpine/Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
