# Brand Mark

Marca visual compacta do SampaUI. Normalmente e usada por `Sidebar` e previews da documentacao.

```blade
<x-sampaui::brand-mark />
```

Com logo, tamanho e link:

```blade
<x-sampaui::brand-mark
    logo="/images/logo.svg"
    alt="Minha empresa"
    label="Minha empresa"
    href="/dashboard"
    size="lg"
/>
```

## Uso recomendado

- Trate como subcomponente visual do pacote.
- Pode ser usado em layouts proprios quando a identidade SampaUI for desejada.
- Usa `primary`, `secondary`, `accent` e `light` da paleta oficial.
- `size` aceita `sm`, `md`, `lg` e `xl`.
- `logo` substitui a marca padrao por uma imagem real; sempre informe `alt`.
