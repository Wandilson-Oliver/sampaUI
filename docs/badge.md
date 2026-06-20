# Badge

Use para status curtos, prioridade, contadores e tags.

```blade
<x-sampaui::badge variant="success" icon="check2-circle">
    Publicado
</x-sampaui::badge>
```

## Props

- `variant`: `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted`, `light`.
- `size`: `xs`, `sm`, `md`, `lg`.
- `icon`: nome Bootstrap Icons sem `bi-`.
- `rounded`: troca entre `rounded-full` e `rounded-default`.

Variantes invalidas retornam para `primary`.

## Exemplos comuns

### Status

```blade
<div class="flex flex-wrap gap-2">
    <x-sampaui::badge variant="success" icon="check2-circle">Publicado</x-sampaui::badge>
    <x-sampaui::badge variant="warning" icon="clock">Pendente</x-sampaui::badge>
    <x-sampaui::badge variant="danger" icon="exclamation-triangle">Revisar</x-sampaui::badge>
    <x-sampaui::badge variant="muted" icon="archive">Arquivado</x-sampaui::badge>
</div>
```

### Prioridade

```blade
<x-sampaui::badge variant="danger" size="lg">Alta</x-sampaui::badge>
<x-sampaui::badge variant="accent">Media</x-sampaui::badge>
<x-sampaui::badge variant="secondary" size="sm">Baixa</x-sampaui::badge>
<x-sampaui::badge variant="info" size="xs">Novo</x-sampaui::badge>
```

### Em tabela com Livewire

```blade
<x-sampaui::badge :variant="$this->statusVariant($property->status)">
    {{ $property->status_label }}
</x-sampaui::badge>
```

```php
public function statusVariant(string $status): string
{
    return [
        'published' => 'success',
        'pending' => 'warning',
        'review' => 'danger',
    ][$status] ?? 'muted';
}
```

Use `appearance="soft|solid|outline"` com qualquer `variant`. Os tamanhos disponiveis sao `xs`, `sm`, `md` e `lg`.
