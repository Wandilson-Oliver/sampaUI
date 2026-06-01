# Tabs

Use para alternar secoes relacionadas na mesma tela.

```blade
<x-sampaui::tabs :tabs="['overview' => 'Resumo', 'media' => 'Midia']" active="overview">
    <x-sampaui::tab-panel name="overview">Resumo do imovel.</x-sampaui::tab-panel>
    <x-sampaui::tab-panel name="media">Galeria e videos.</x-sampaui::tab-panel>
</x-sampaui::tabs>
```

## Props

- `tabs`: mapa `chave => label`.
- `active`: chave inicial.

## Subcomponente

`x-sampaui::tab-panel` deve ser usado dentro de `x-sampaui::tabs` e recebe `name`.

