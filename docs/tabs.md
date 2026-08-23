# Tabs

Use para alternar secoes relacionadas na mesma tela.

```blade
<x-sampaui::tabs :tabs="['overview' => 'Resumo', 'media' => 'Midia']" active="overview">
    <x-sampaui::tab-panel name="overview">Resumo do imovel.</x-sampaui::tab-panel>
    <x-sampaui::tab-panel name="media">Galeria e videos.</x-sampaui::tab-panel>
</x-sampaui::tabs>
```

## Propriedades

- `tabs`: mapa `chave => label`.
- `active`: chave inicial.

## Subcomponente

`x-sampaui::tab-panel` deve ser usado dentro de `x-sampaui::tabs` e recebe `name`.

## Uso

Use `<x-sampaui::tabs />` como ponto de partida e adapte apenas o layout com `class=""`.

## Exemplos

```blade
<x-sampaui::tabs :tabs="$tabs" active="overview" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Pode controlar a aba ativa via estado Alpine/Livewire.
