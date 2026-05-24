# Textarea

Campo de texto longo.

Renderiza um `<textarea>` nativo com label opcional, estado de erro e suporte direto a atributos Livewire/Alpine.

## Uso

```blade
<x-sampaui::textarea
    name="description"
    label="Descricao"
    rows="6"
    wire:model.live="description"
/>
```

Com valor inicial:

```blade
<x-sampaui::textarea name="briefing" label="Briefing">
Cliente precisa priorizar lancamento mobile no proximo trimestre.
</x-sampaui::textarea>
```

Com erro manual:

```blade
<x-sampaui::textarea
    name="notes"
    label="Observacoes"
    error="Inclua uma observacao antes de continuar."
/>
```

## Props

- `label`
- `name`
- `rows`
- `placeholder`
- `error`
- `disabled`
