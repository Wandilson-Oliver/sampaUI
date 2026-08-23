# Input

Campo de texto com label, erro e suporte a atributos Livewire.

A borda padrao usa `border-secondary/20`. Com Livewire, use apenas `wire:model`; nao e necessario informar `value`.
Erros do validator sao resolvidos automaticamente pela prop `name` ou pelo caminho de `wire:model`, inclusive com modificadores como `.live` e `.blur`.

## Uso

```blade
<x-sampaui::input
    label="Email"
    placeholder="voce@empresa.com"
    wire:model.live="email"
    required
/>
```

Depois de `$this->validate()`, a primeira mensagem de erro e exibida abaixo do campo com borda e anel `danger`. A prop `error` continua disponivel para mensagens manuais.

## Com icone

Use `icon` para um Bootstrap Icon simples, sem o prefixo `bi-`.

```blade
<x-sampaui::input
    name="email"
    label="Email"
    icon="envelope"
    placeholder="voce@empresa.com"
/>
```

Para casos customizados, use os slots nomeados `prefix` e `suffix`.

Campos `type="password"` ja renderizam um botao de mostrar/ocultar senha quando `revealable` esta ativo.

```blade
<x-sampaui::input
    name="password"
    type="password"
    label="Senha"
    icon="lock"
/>
```

Se precisar controlar o botao manualmente, o slot `suffix` fica dentro do mesmo escopo Alpine do input.

```blade
<x-sampaui::input name="password" type="password" label="Senha" icon="lock">
    <x-slot:suffix>
        <button
            type="button"
            x-on:click="showPassword = ! showPassword"
            x-bind:aria-label="showPassword ? 'Ocultar senha' : 'Mostrar senha'"
        >
            <i class="bi" x-bind:class="showPassword ? 'bi-eye-slash' : 'bi-eye'"></i>
        </button>
    </x-slot:suffix>
</x-sampaui::input>
```

```blade
<x-sampaui::input name="password" type="password" label="Senha" :revealable="false">
    <x-slot:prefix>
        <i class="bi bi-lock"></i>
    </x-slot:prefix>
</x-sampaui::input>
```

## Propriedades

- `type`
- `label`
- `name`
- `value`: valor inicial opcional para uso sem Livewire
- `placeholder`
- `error`
- `disabled`
- `icon`: nome Bootstrap Icons sem o prefixo `bi-`
- `revealable`: habilita o botao automatico de mostrar/ocultar senha quando `type="password"`

## Slots

- `prefix`: conteudo exibido dentro do campo, à esquerda
- `suffix`: conteudo exibido dentro do campo, à direita

## Estados premium

Use `hint`, `required`, `readonly`, `loading`, `loading-target` e `state="success|warning|error"`. `clearable` adiciona limpeza acessivel e sincronizada com Alpine/Livewire. Label, hint e erro usam ids associados ao input real.

## Propriedades adicionais

- `state`: propriedade pública do componente.
- `clear-label`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::input name="email" label="Email" icon="envelope" wire:model.live="email" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- wire:model fica no input real e nao exige prop value.
