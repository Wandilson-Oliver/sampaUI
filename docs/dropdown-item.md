# Dropdown Item

Subcomponente de `Dropdown`. Use apenas dentro de `x-sampaui::dropdown`.

```blade
<x-sampaui::dropdown-item icon="archive" wire:click="archive">
    Arquivar
</x-sampaui::dropdown-item>
```

## Contrato

- Renderiza `a` quando `href` e informado.
- Renderiza `button` quando nao houver `href`.
- Preserva atributos Livewire, Alpine e HTML.
- Usa `role="menuitem"` para acessibilidade.

