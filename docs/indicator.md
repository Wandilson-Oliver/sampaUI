# Indicator

Ponto visual para estado, presenca, conexao ou alerta.

Ponto visual para estado, presenca, conexao ou alerta. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::indicator variant="success" label="Online" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `variant` | `string` | `primary` | Variante de cor e tema semântico do componente. |
| `pulse` | `bool` | `false` | Aplica animação suave de pulsação luminosa. |
| `label` | `string|null` | `null` | Rótulo textual exibido acima ou ao lado do componente. |

## Exemplos

```blade
<x-sampaui::indicator variant="success" label="Online" />
```

## Boas práticas

- Bom para estados calculados de disponibilidade.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
