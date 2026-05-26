# Sidebar

Navegacao lateral para areas internas. O componente nao depende de rotas fixas nem de `auth()`: todos os links e dados do usuario entram por props.

Sem secoes:

```blade
<x-sampaui::sidebar
    brand="LIACOR"
    initial-state="open"
    brand-href="/dashboard"
    active-color="#7057F6"
    :user="[
        'name' => 'Administrador Lia',
        'email' => 'admin@liacorretora.com',
        'avatar' => '/images/avatar.jpg',
    ]"
    :items="[
        ['label' => 'Dashboard', 'href' => '/dashboard', 'icon' => 'grid', 'active' => true],
        ['label' => 'Clientes', 'href' => '/clients', 'icon' => 'people', 'navigate' => true],
        ['label' => 'Imóveis', 'href' => '/properties', 'icon' => 'buildings'],
        ['label' => 'Mapa', 'href' => '/map', 'icon' => 'map'],
        ['label' => 'Tarefa', 'href' => '/tasks', 'icon' => 'kanban', 'active' => true],
    ]"
/>
```

Com secoes:

```blade
<x-sampaui::sidebar
    brand="Operacao"
    initial-state="closed"
    :items="[
        ['label' => 'Dashboard', 'href' => '/dashboard', 'icon' => 'grid', 'active' => true],
    ]"
    :sections="[
        ['label' => 'Gestao', 'items' => [
            ['label' => 'Clientes', 'href' => '/clients', 'icon' => 'people'],
            ['label' => 'Contratos', 'href' => '/contracts', 'icon' => 'file-earmark-text'],
        ]],
    ]"
    logout-href="/logout"
/>
```

## Props

- `brand`: nome exibido no topo.
- `brandHref`: destino do link da marca.
- `brandIcon`: nome Bootstrap Icon sem `bi-`.
- `items`: links principais.
- `sections`: grupos adicionais com `label` e `items`.
- `user`: array opcional com `name`, `email` e `avatar`.
- `initial-state`: `open`, `closed` ou `collapsed`. Define se inicia aberta ou recolhida.
- `collapsed`: alias legado para iniciar recolhida em desktop.
- `collapsible`: exibe botao flutuante para recolher/expandir.
- `activeColor`: cor do item ativo.
- `openEvent`: evento Alpine para abrir no mobile.
- `closeEvent`: evento Alpine para fechar no mobile.
- `logoutHref`: exibe link de saida quando informado.
- `footer`: slot nomeado para substituir o rodape.

Cada item aceita `label`, `href`, `icon`, `active` e `navigate`. Use `navigate => true` para adicionar `wire:navigate`.
