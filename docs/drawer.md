# Drawer

Use para fluxos laterais como filtros, edicao rapida e detalhes.

```blade
<x-sampaui::drawer model="filtersOpen" title="Filtros" variant="primary">
    Conteudo dos filtros.
</x-sampaui::drawer>
```

## Propriedades

- `model`: propriedade Livewire booleana entangled.
- `title`, `subtitle`: cabecalho acessivel.
- `placement`: `left`, `right`, `top`, `bottom`.
- `size`: `sm`, `md`, `lg`, `xl`, `2xl`, `full`.
- `variant`: `default`, `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted`.
- `persistent`: impede fechar clicando fora.
- `close-button`: controla o botao de fechar.

O painel e teletransportado para o `body`, sempre entra pela borda real da janela e fecha na mesma direcao de `placement`. Ele recebe foco ao abrir e bloqueia o scroll do documento.

O foco fica preso no painel e retorna ao acionador ao fechar. `close-on-escape` e `close-on-outside` permitem configurar cada comportamento; `persistent` desativa ambos por padrao.

## Uso

Use `<x-sampaui::drawer />` como ponto de partida e adapte apenas o layout com `class=""`.

## Propriedades adicionais

- `close-event`: propriedade pública do componente.
- `after-close`: propriedade pública do componente.
- `panel-class`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::drawer model="filtersOpen" title="Filtros">Conteudo</x-sampaui::drawer>
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Controle abertura com uma propriedade booleana Livewire informada em model.
