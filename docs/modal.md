# Modal

Use para confirmacoes, formularios curtos e detalhes importantes.

```blade
<x-sampaui::modal model="deleteOpen" title="Remover imovel">
    Confirme antes de remover este registro.
</x-sampaui::modal>
```

## Propriedades

- `model`: propriedade Livewire booleana entangled.
- `title`, `subtitle`: cabecalho acessivel.
- `size`: controla largura.
- `persistent`: impede fechar clicando fora.
- `close-button`: controla o botao de fechar.

O modal bloqueia scroll, e teletransportado para o `body`, preserva `role="dialog"` e recebe foco ao abrir. A camada fixa evita que o morph do Livewire remonte um `<dialog>` nativo fechado e mantem o overlay acima de sidebars, topbars e containers com `overflow`.

O foco fica preso no painel e retorna ao acionador. `close-on-escape` e `close-on-outside` configuram o fechamento; `persistent` desativa ambos por padrao.

## Uso

Use `<x-sampaui::modal />` como ponto de partida e adapte apenas o layout com `class=""`.

## Propriedades adicionais

- `variant`: propriedade pública do componente.
- `close-event`: propriedade pública do componente.
- `after-close`: propriedade pública do componente.
- `panel-class`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::modal model="confirmOpen" title="Confirmar">Conteudo</x-sampaui::modal>
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Controle abertura com uma propriedade booleana Livewire informada em model.
