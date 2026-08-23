# Tab Panel

Subcomponente de `Tabs`. Use apenas dentro de `x-sampaui::tabs`.

```blade
<x-sampaui::tab-panel name="details">
    Conteudo da aba.
</x-sampaui::tab-panel>
```

## Contrato

- `name`: mesma chave declarada em `tabs`.
- O painel aparece quando a aba ativa corresponde ao nome.
- O componente mantem o conteudo no DOM para preservar estado local simples.

## Uso

Use `<x-sampaui::tab-panel />` como ponto de partida e adapte apenas o layout com `class=""`.

## Propriedades

- `name`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::tab-panel name="details">Detalhes</x-sampaui::tab-panel>
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Conteudo interno pode ser Livewire.
