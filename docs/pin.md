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
