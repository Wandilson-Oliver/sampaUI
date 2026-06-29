# Sidebar

Navegacao lateral para areas internas. O componente nao depende de rotas fixas nem de `auth()`: todos os links e dados do usuario entram por props.

Sem secoes:

```blade
<x-sampaui::sidebar
    brand="SampaUI"
    initial-state="open"
    brand-href="/dashboard"
    src="/images/minha-logo.png"
    logo-alt="Minha marca"
    :user="[
        'name' => 'Administrador Lia',
        'email' => 'admin@sampa.dev',
        'avatar' => '/images/avatar.jpg',
    ]"
    :items="[
        ['label' => 'Dashboard', 'href' => '/dashboard', 'icon' => 'grid'],
        ['label' => 'Clientes', 'href' => '/clients', 'icon' => 'people', 'navigate' => true],
        ['label' => 'Imóveis', 'href' => '/properties', 'icon' => 'buildings'],
        ['label' => 'Mapa', 'href' => '/map', 'icon' => 'map'],
        ['label' => 'Tarefa', 'href' => '/tasks', 'icon' => 'kanban'],
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
- `src`: URL da imagem que substitui o simbolo oficial no topo.
- `logo`: alias legado de `src`, mantido para compatibilidade.
- `logoAlt`: texto alternativo da imagem informada em `src` ou `logo`.
- `items`: links principais.
- `sections`: grupos adicionais com `label` e `items`.
- `user`: array opcional com `name`, `email` e `avatar`.
- `initial-state`: `open`, `closed` ou `collapsed`. Define se inicia aberta ou recolhida.
- `collapsed`: alias legado para iniciar recolhida em desktop.
- `collapsible`: exibe botao flutuante para recolher/expandir.
- `openEvent`: evento Alpine para abrir no mobile.
- `closeEvent`: evento Alpine para fechar no mobile.
- `stateEvent`: informa a largura atual para o layout ajustar o conteudo.
- `rail`: controla a faixa externa clara que separa a navegacao do conteudo; o padrao e `true`.
- `position`: `fixed` em dashboards ou `static` quando estiver dentro de um container/preview.
- `logoutHref`: exibe link de saida quando informado.
- `footer`: slot nomeado para substituir o rodape.

Cada item aceita `label`, `href`, `icon`, `active` e `navigate`. Use `navigate => true` para adicionar `wire:navigate`.

A largura expandida padrao e `20rem`; recolhida, `6rem`. O item ativo usa apenas um circulo violeta suave no icone, preservando a leitura leve da navegacao.
