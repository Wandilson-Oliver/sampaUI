# Stepper

Use para fluxos sequenciais.

```blade
<x-sampaui::stepper
    :current="2"
    :steps="['Dados', 'Midia', 'Publicacao']"
/>
```

## Props

- `steps`: array de etapas.
- `current`: indice atual baseado em `1`.

Etapas completas, atual e futuras recebem estilos diferentes com a paleta oficial.

## Formulario com validacao

```blade
@php
    $currentStep = 2;
    $steps = [
        ['label' => 'Dados', 'description' => 'Identificacao do cliente'],
        ['label' => 'Contato', 'description' => 'Canais obrigatorios'],
        ['label' => 'Revisao', 'description' => 'Confirmacao final'],
    ];
@endphp

<form wire:submit.prevent="save" class="grid gap-6">
    <x-sampaui::stepper :current="$currentStep" :steps="$steps" />

    <div class="grid gap-4 md:grid-cols-2">
        <x-sampaui::input
            name="name"
            label="Nome"
            wire:model.live="name"
            error="Informe o nome completo."
        />

        <x-sampaui::input
            name="email"
            type="email"
            label="Email"
            wire:model.live="email"
            error="Use um email valido."
        />
    </div>

    <x-sampaui::button type="submit" icon="check2-circle">
        Validar e salvar
    </x-sampaui::button>
</form>
```
