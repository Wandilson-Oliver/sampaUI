# Skeleton

Placeholder de carregamento para listas, cards e textos.

Use Skeleton quando o layout final ja e conhecido e a espera e curta. Ele evita salto visual enquanto Livewire, filtros ou requisicoes assíncronas atualizam a tela.

## Uso

```blade
<x-sampaui::skeleton lines="3" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `lines` | `int` | `1` | Quantidade de linhas horizontais. A ultima linha fica menor para simular texto real. |
| `circle` | `bool` | `false` | Renderiza bloco circular para avatar, icone ou thumbnail. |

## Exemplos

```blade
<x-sampaui::skeleton lines="3" />
```

## Boas práticas

- Use com wire:loading para estados de carregamento.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
