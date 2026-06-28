# Modal

Use para confirmacoes, formularios curtos e detalhes importantes.

```blade
<x-sampaui::modal model="deleteOpen" title="Remover imovel">
    Confirme antes de remover este registro.
</x-sampaui::modal>
```

## Props

- `model`: propriedade Livewire booleana entangled.
- `title`, `subtitle`: cabecalho acessivel.
- `size`: controla largura.
- `persistent`: impede fechar clicando fora.
- `close-button`: controla o botao de fechar.

O modal bloqueia scroll, e teletransportado para o `body`, preserva `role="dialog"` e recebe foco ao abrir. A camada fixa evita que o morph do Livewire remonte um `<dialog>` nativo fechado e mantem o overlay acima de sidebars, topbars e containers com `overflow`.

O foco fica preso no painel e retorna ao acionador. `close-on-escape` e `close-on-outside` configuram o fechamento; `persistent` desativa ambos por padrao.
