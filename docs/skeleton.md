# Skeleton

Use para estados de carregamento quando o layout final ja e conhecido. Skeleton evita salto visual em listas, cards, tabelas e buscas Livewire.

```blade
<x-sampaui::skeleton :lines="3" />
```

## Props

- `lines`: quantidade de linhas.
- `circle`: renderiza bloco circular para avatar, icone ou thumbnail.
- `class`: ajusta largura, altura e espacamento.

Prefira skeletons quando o layout final ja e conhecido e a espera e curta.

## Card carregando

```blade
<div class="rounded-default border border-border bg-white p-5">
    <div class="flex items-center gap-4">
        <x-sampaui::skeleton circle class="h-14 w-14" />

        <div class="flex-1">
            <x-sampaui::skeleton class="h-4 w-2/3" />
            <x-sampaui::skeleton class="mt-3 h-3 w-1/2" />
        </div>
    </div>

    <div class="mt-6">
        <x-sampaui::skeleton :lines="3" />
    </div>
</div>
```

## Lista ou tabela

```blade
@foreach (range(1, 4) as $row)
    <div class="flex items-center gap-4 rounded-default border border-border bg-white p-4">
        <x-sampaui::skeleton circle class="h-10 w-10" />
        <x-sampaui::skeleton class="h-4 flex-1" />
        <x-sampaui::skeleton class="h-4 w-24" />
    </div>
@endforeach
```

## Com Livewire

```blade
<div wire:loading wire:target="filter">
    <x-sampaui::skeleton :lines="4" />
</div>

<div wire:loading.remove wire:target="filter">
    {{-- conteudo real da lista --}}
</div>
```
