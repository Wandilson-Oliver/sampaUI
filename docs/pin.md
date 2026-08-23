# Pin

Campo de PIN para codigos curtos, 2FA, confirmacao por email/SMS e validacoes similares.

O componente renderiza caixas individuais para digitacao e mantem um valor unico em um input hidden, funcionando com formulario tradicional e `wire:model`.

```blade
<x-sampaui::pin
    name="code"
    label="Codigo de verificacao"
    length="5"
/>
```

Com ajuda, prefixo e limpar:

```blade
<x-sampaui::pin
    name="recovery_code"
    label="Insira o codigo"
    hint="Enviamos um codigo de 5 digitos para seu email."
    prefix="G-"
    length="5"
    clear
/>
```

Somente numeros:

```blade
<x-sampaui::pin
    name="otp"
    label="Codigo de acesso"
    length="6"
    numbers
/>
```

Somente letras:

```blade
<x-sampaui::pin
    name="invite"
    label="Codigo do convite"
    length="4"
    letters
/>
```

Com Livewire:

```blade
<form wire:submit="verify">
    <x-sampaui::pin
        name="pin"
        label="Digite seu codigo"
        length="6"
        numbers
        smart
        wire:model.live="pin"
    />
</form>
```

No Livewire, use propriedade string:

```php
public string $pin = '';
```

O componente usa `x-modelable="value"` para manter sincronizacao bidirecional. Nao passe `value` junto com `wire:model`.

Eventos Alpine:

```blade
<x-sampaui::pin
    name="code"
    length="5"
    clear
    x-on:filled="console.log($event.detail.model)"
    x-on:clear="console.log('limpo')"
/>
```

O evento `filled` e disparado quando todas as caixas foram preenchidas. O evento `clear` e disparado quando o botao de limpar e usado.

Com `smart`, o formulario pai e enviado automaticamente uma vez quando o PIN fica completo. Depois do envio, e preciso limpar ou alterar o valor antes de enviar automaticamente de novo.

## Uso

Use `<x-sampaui::pin />` como ponto de partida e adapte apenas o layout com `class=""`.

## Propriedades

- `name`: propriedade pública do componente.
- `label`: propriedade pública do componente.
- `hint`: propriedade pública do componente.
- `value`: propriedade pública do componente.
- `length`: propriedade pública do componente.
- `prefix`: propriedade pública do componente.
- `numbers`: propriedade pública do componente.
- `letters`: propriedade pública do componente.
- `clear`: propriedade pública do componente.
- `smart`: propriedade pública do componente.
- `disabled`: propriedade pública do componente.
- `error`: propriedade pública do componente.
- `required`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::pin name="code" label="Codigo" length="6" numbers wire:model.live="code" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Suporta x-modelable e sincronizacao bidirecional com Livewire.
