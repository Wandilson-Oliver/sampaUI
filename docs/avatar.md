# Avatar

Use para representar usuarios, clientes ou responsaveis.

```blade
<x-sampaui::avatar name="Wandilson Oliveira" status="online" />

<x-sampaui::avatar
    src="/users/wandilson.jpg"
    name="Wandilson Oliveira"
    size="xl"
/>
```

## Propriedades

- `src`: imagem opcional.
- `name`: usado para iniciais e `alt` padrao.
- `alt`: texto alternativo quando `src` existir.
- `size`: `xs`, `sm`, `md`, `lg`, `xl`, `2xl`.
- `rounded`: usa circulo quando verdadeiro.
- `status`: `online`, `busy`, `away`, `offline`.

Status usam a paleta oficial: `success`, `danger`, `accent` e `secondary`.

## Uso

Use `<x-sampaui::avatar />` como ponto de partida e adapte apenas o layout com `class=""`.

## Exemplos

```blade
<x-sampaui::avatar name="Ana Souza" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Componente visual estatico, seguro em renders Livewire.
