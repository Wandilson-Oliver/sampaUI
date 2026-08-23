# Accordion

Use para agrupar conteudo em secoes expansivas sem tirar o usuario da pagina.

```blade
<x-sampaui::accordion
    :items="[
        ['title' => 'Dados do imovel', 'content' => 'Area, quartos e endereco.', 'open' => true],
        ['title' => 'Publicacao', 'content' => 'SEO, destaque e revisao.'],
    ]"
/>
```

## Contrato

- `items`: array com `title`, `content` e `open` opcional.
- `multiple`: permite manter mais de uma seção aberta. O padrão é `true`, preservando o comportamento anterior.
- O componente usa Alpine local e preserva classes adicionais via `class=""`.
- Cada trigger atualiza `aria-expanded` e referencia seu painel com `aria-controls`.

## Uso

Use `<x-sampaui::accordion />` como ponto de partida e adapte apenas o layout com `class=""`.

## Propriedades

- `items`: propriedade pública do componente.
- `multiple`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::accordion :items="$items" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Preserva atributos wire:* no elemento raiz.
