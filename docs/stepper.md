# Stepper

Sequencia de etapas para onboarding, checkout e fluxos guiados.

Sequencia de etapas para onboarding, checkout e fluxos guiados. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::stepper :steps="$steps" :current="2" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `steps` | `array` | `[]` | Etapas do progresso com labels e descrições. |
| `current` | `int` | `1` | Índice da etapa ativa atual (iniciando em 1). |

## Exemplos

```blade
<x-sampaui::stepper :steps="$steps" :current="2" />
```

## Boas práticas

- Passos podem refletir estado de formulario Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
