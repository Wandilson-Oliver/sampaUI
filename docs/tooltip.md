# Tooltip

Use para explicar controles compactos.

```blade
<x-sampaui::tooltip text="Copiar link" position="top">
    <button type="button">Copiar</button>
</x-sampaui::tooltip>
```

## Propriedades

- `text`: conteudo do tooltip.
- `position`: `top`, `right`, `bottom`, `left`.

Use tooltips para complemento curto. Nao esconda informacao essencial dentro deles.

## Uso

Use `<x-sampaui::tooltip />` como ponto de partida e adapte apenas o layout com `class=""`.

## Exemplos

```blade
<x-sampaui::tooltip text="Ajuda"><x-sampaui::button icon="question" /></x-sampaui::tooltip>
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Componente visual, seguro em re-renderizacoes.
