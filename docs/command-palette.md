# Command Palette

Use para acoes rapidas, busca global e navegacao por teclado em dashboards e sistemas administrativos.

```blade
<x-sampaui::command-palette
    :items="[
        ['label' => 'Novo imovel', 'href' => '/imoveis/create', 'icon' => 'plus'],
        ['label' => 'Ver categorias', 'href' => '/categorias', 'icon' => 'tags'],
    ]"
/>
```

Abra disparando o evento:

```blade
<x-sampaui::button
    variant="outline"
    icon="search"
    x-on:click="$dispatch('sampaui:command-open')"
>
    Buscar comando
</x-sampaui::button>
```

## Props

- `items`: array de comandos com `label`, `href` e `icon` opcional.
- `placeholder`: texto do campo de busca interno.
- `openEvent`: evento global escutado para abrir a paleta. Padrao: `sampaui:command-open`.
- `$slot`: conteudo adicional dentro da lista.

## Atalho Cmd/Ctrl + K

```blade
<div
    x-data
    x-on:keydown.window.prevent.meta.k="$dispatch('sampaui:command-open')"
    x-on:keydown.window.prevent.ctrl.k="$dispatch('sampaui:command-open')"
>
    <x-sampaui::command-palette :items="$commands" />
</div>
```

## Classe Livewire

```php
public array $commands = [];

public function mount(): void
{
    $this->commands = [
        ['label' => 'Novo imovel', 'href' => route('properties.create'), 'icon' => 'plus'],
        ['label' => 'Revisar imoveis', 'href' => route('properties.review'), 'icon' => 'house-check'],
        ['label' => 'Categorias', 'href' => route('categories.index'), 'icon' => 'tags'],
    ];
}
```

```blade
<x-sampaui::command-palette :items="$commands" />
```

## Evento customizado

```blade
<x-sampaui::button x-on:click="$dispatch('open-dashboard-search')">
    Abrir atalhos
</x-sampaui::button>

<x-sampaui::command-palette
    open-event="open-dashboard-search"
    :items="$commands"
/>
```

## Acessibilidade

- O campo de busca recebe foco ao abrir.
- O overlay fecha no clique externo.
- Use labels objetivos para cada item de comando.
