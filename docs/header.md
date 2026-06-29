# Header

Cabecalho de pagina para dashboards e telas internas.

```blade
<x-sampaui::header
    title="Clientes"
    subtitle="Gerencie relacionamentos comerciais"
    eyebrow="CRM"
    status="Atualizado agora"
/>
```

Com acoes:

```blade
<x-sampaui::header title="Clientes" subtitle="Pipeline comercial">
    <x-slot:actions>
        <x-sampaui::button icon="plus">Novo cliente</x-sampaui::button>
        <x-sampaui::button variant="outline" icon="download">Exportar</x-sampaui::button>
    </x-slot:actions>
</x-sampaui::header>
```

Com botao mobile para abrir sidebar:

```blade
<x-sampaui::header
    title="Dashboard"
    subtitle="Resumo operacional"
    menu
    menu-event="sampaui:sidebar-open"
/>
```

Topbar com busca e notificacoes:

```blade
<x-sampaui::header
    title="Dashboard"
    search
    search-model="search"
    notifications
    notification-count="3"
    sticky
/>
```

## Props

- `title`: titulo principal.
- `subtitle`: texto auxiliar abaixo do titulo.
- `eyebrow`: label curto acima do titulo.
- `status`: pill exibida na direita.
- `menu`: exibe botao mobile de navegacao.
- `menu-event`: evento Alpine disparado pelo botao mobile.
- `search`, `search-name`, `search-model`, `search-placeholder`: busca integrada opcional.
- `notifications`, `notification-count`, `notification-event`: atalho opcional para notificacoes.
- `sticky`: fixa o header no topo do container.
- `actions`: slot nomeado para comandos.

Os slots padrao `left`, `center` e `right` permitem composicoes responsivas; `actions` permanece compativel como atalho da area direita. O titulo rotula o `<header>` automaticamente, ou use `aria-label`.
