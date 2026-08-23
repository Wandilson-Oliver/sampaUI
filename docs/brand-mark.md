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
- Usa o simbolo oficial multicolorido do SampaUI por padrao.
- `size` aceita `sm`, `md`, `lg` e `xl`.
- `logo` substitui a marca padrao por uma imagem real; sempre informe `alt`.

## Uso

Use `<x-sampaui::brand-mark />` como ponto de partida e adapte apenas o layout com `class=""`.

## Propriedades

- `icon`: propriedade pública do componente.
- `logo`: propriedade pública do componente.
- `alt`: propriedade pública do componente.
- `label`: propriedade pública do componente.
- `href`: propriedade pública do componente.
- `size`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::brand-mark label="SampaUI" href="/" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Aceita wire:navigate quando usado como link.
