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

## Props

- `src`: imagem opcional.
- `name`: usado para iniciais e `alt` padrao.
- `alt`: texto alternativo quando `src` existir.
- `size`: `xs`, `sm`, `md`, `lg`, `xl`, `2xl`.
- `rounded`: usa circulo quando verdadeiro.
- `status`: `online`, `busy`, `away`, `offline`.

Status usam a paleta oficial: `success`, `danger`, `accent` e `secondary`.

