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
- O componente usa Alpine local e preserva classes adicionais via `class=""`.
- Cada trigger atualiza `aria-expanded` para leitores de tela.

