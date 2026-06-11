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

O modal bloqueia scroll, usa `<dialog>` nativo com top layer do navegador, preserva `role="dialog"` e recebe foco ao abrir. Isso mantém o overlay acima de sidebars, topbars e containers com `overflow`.
