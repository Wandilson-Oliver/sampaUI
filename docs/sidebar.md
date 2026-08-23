# Sidebar

Navegacao lateral para areas internas. O componente nao depende de rotas fixas nem de `auth()`: todos os links e dados do usuario entram por props.

Sem secoes:

```blade
<x-sampaui::sidebar
    logo-src="/images/minha-logo.png"
    logo-alt="Minha marca"
    initial-state="open"
    brand-href="/dashboard"
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
    logo-src="/images/logo-operacao.svg"
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

## Propriedades

- `logoSrc`: URL da logo exibida no topo. Em Blade, use `logo-src`.
- `logoAlt`: texto alternativo da logo.
- `brandHref`: destino do link da marca.
- `items`: links principais.
- `sections`: grupos adicionais com `label` e `items`.
- `user`: array opcional com `name`, `email` e `avatar`.
- `initial-state`: `open`, `closed` ou `collapsed`. Define se inicia aberta ou recolhida.
- `collapsed`: alias legado para iniciar recolhida em desktop.
- `collapsible`: exibe botao flutuante para recolher/expandir.
- `openEvent`: evento Alpine para abrir no mobile.
- `closeEvent`: evento Alpine para fechar no mobile.
- `stateEvent`: informa a largura atual para o layout ajustar o conteudo.
- `position`: `fixed` em dashboards ou `static` quando estiver dentro de um container/preview.
- `logoutHref`: exibe link de saida quando informado.
- `footer`: slot nomeado para substituir o rodape.

Cada item aceita `label`, `href`, `icon`, `active` e `navigate`. Use `navigate => true` para adicionar `wire:navigate`.

A largura expandida padrao e `18rem`; recolhida, `6rem`. A Sidebar nao cria faixa de fundo externa. O item ativo reutiliza o mesmo circulo suave do hover, sem fundo no link inteiro, e o espaco entre icone e texto usa `gap-3.5`. O link de saida e outline danger sem sombra.

## Uso

Use `<x-sampaui::sidebar />` como ponto de partida e adapte apenas o layout com `class=""`.

## Propriedades adicionais

- `avatar-alt`: propriedade pública do componente.
- `active-color`: propriedade pública do componente.
- `logout-label`: propriedade pública do componente.

## Exemplos

```blade
<x-sampaui::sidebar logo-src="/images/logo.svg" :items="$items" />
```

## Boas práticas

- Preserve os atributos `wire:*`, `x-*`, `aria-*` e HTML no elemento interativo real.
- Use os tokens semânticos do SampaUI e `class=""` para layout, sem duplicar o componente com HTML solto.
- Itens podem usar wire:navigate.
