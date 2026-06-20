# Drawer

Use para fluxos laterais como filtros, edicao rapida e detalhes.

```blade
<x-sampaui::drawer model="filtersOpen" title="Filtros" variant="primary">
    Conteudo dos filtros.
</x-sampaui::drawer>
```

## Props

- `model`: propriedade Livewire booleana entangled.
- `title`, `subtitle`: cabecalho acessivel.
- `placement`: `left`, `right`, `top`, `bottom`.
- `size`: `sm`, `md`, `lg`, `xl`, `2xl`, `full`.
- `variant`: `default`, `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted`.
- `persistent`: impede fechar clicando fora.
- `close-button`: controla o botao de fechar.

O painel recebe foco ao abrir e bloqueia scroll do documento.

O foco fica preso no painel e retorna ao acionador ao fechar. `close-on-escape` e `close-on-outside` permitem configurar cada comportamento; `persistent` desativa ambos por padrao.
