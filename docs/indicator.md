# Indicator

Use para estados pequenos com ponto visual.

```blade
<x-sampaui::indicator variant="danger" pulse label="Atrasado" />
```

## Propriedades

- `variant`: tokens da paleta oficial.
- `label`: texto ao lado do ponto.
- `pulse`: adiciona animacao discreta.

## Uso

Use `<x-sampaui::indicator />` como ponto de partida e adapte apenas o layout com `class=""`.

## Exemplos

```blade
<x-sampaui::indicator variant="success" label="Online" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Bom para estados calculados de disponibilidade.
