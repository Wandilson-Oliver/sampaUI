# Sidebar

Navegação lateral responsiva de 18rem com suporte a colapso inteligente, subitens sanfona, badges de contagem/notificação, backdrop mobile, slots flexíveis e controle de estado reativo.

Use em áreas autenticadas e dashboards. A Sidebar não cria fundo fora da superfície principal; o item ativo reutiliza o círculo do hover, o botão recolhe/expande no desktop e exibe backdrop com tecla `Escape` no mobile.

## Uso

```blade
<x-sampaui::sidebar logo-src="/images/logo.svg" :items="$items" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `logo-src` | `string|null` | `null` | URL da logo do cliente. Em Blade, use `logo-src`. |
| `logo-alt` | `string|null` | `Logo` | Texto alternativo da logo. |
| `brand-href` | `string` | `#` | Destino do link da marca. |
| `items` | `array` | `[]` | Links principais do menu. Suporta `label`, `href`, `icon`, `active`, `navigate`, `badge`, `badgeVariant`, `children`. |
| `sections` | `array` | `[]` | Grupos adicionais com `label` e `items`. |
| `user` | `array|null` | `null` | Dados opcionais: `name`, `email`, `avatar`. |
| `avatar` | `string|null` | `null` | Atalho para avatar do usuário quando preferir não passar `user[avatar]`. |
| `avatar-alt` | `string|null` | `user.name` | Texto alternativo da imagem do avatar. |
| `initial-state` | `open|closed|collapsed|null` | `null` | Define se a sidebar inicia aberta ou recolhida. `closed` e `collapsed` são equivalentes. |
| `collapsed` | `bool` | `false` | Alias legado para iniciar recolhida. Em novos usos, prefira `initial-state="closed"`. |
| `collapsible` | `bool` | `true` | Exibe botão flutuante para recolher ou expandir. |
| `close-event` | `string` | `sampaui:sidebar-close` | Evento Alpine para fechar no mobile. |
| `open-event` | `string` | `sampaui:sidebar-open` | Evento Alpine para abrir no mobile. |
| `stateEvent` | `string` | `sampaui:sidebar-state` | Evento emitido ao iniciar, abrir, fechar ou recolher. Use para ajustar `margin-left` do conteúdo. |
| `active-color` | `string` | `primary` | Cor de destaque do item ativo. |
| `logout-href` | `string|null` | `null` | Exibe link de saída quando informado. |
| `logout-label` | `string` | `Sair do sistema` | Rótulo acessível do botão de logout. |
| `position` | `fixed|static` | `fixed` | Use `static` apenas quando a sidebar participar de um container ou preview; dashboards usam `fixed`. |

## Estrutura de Itens & Subitens

```php
$items = [
    [
        'label' => 'Dashboard',
        'href' => '/dashboard',
        'icon' => 'speedometer2',
        'active' => true,
    ],
    [
        'label' => 'Mensagens',
        'href' => '/mensagens',
        'icon' => 'chat-dots',
        'badge' => '5',
        'badgeVariant' => 'danger',
    ],
    [
        'label' => 'Cadastros',
        'icon' => 'folder',
        'children' => [
            ['label' => 'Clientes', 'href' => '/clientes', 'active' => false],
            ['label' => 'Fornecedores', 'href' => '/fornecedores'],
        ],
    ],
];
```

## Slots

- `brand`: Customização completa da logo/marca no topo.
- `header`: Alias de cabeçalho.
- `userSlot`: Substitui a área padrão do perfil do usuário.
- `default`: Injeta componentes e blocos extras dentro da navegação com scroll.
- `footer`: Substitui o rodapé padrão da sidebar.

## Exemplos

### 1. Com Badges e Subitens

```blade
<x-sampaui::sidebar
    logo-src="/images/logo.svg"
    :items="[
        ['label' => 'Dashboard', 'href' => '/dashboard', 'icon' => 'grid', 'active' => true],
        ['label' => 'Mensagens', 'href' => '/chat', 'icon' => 'chat', 'badge' => '3', 'badgeVariant' => 'danger'],
        [
            'label' => 'Vendas',
            'icon' => 'cart',
            'children' => [
                ['label' => 'Pedidos', 'href' => '/orders'],
                ['label' => 'Faturamento', 'href' => '/invoices'],
            ],
        ],
    ]"
    :user="['name' => 'Ana Silva', 'email' => 'ana@empresa.com']"
    logout-href="/logout"
/>
```

### 2. Com Slots Customizados

```blade
<x-sampaui::sidebar>
    <x-slot:brand>
        <div class="flex items-center gap-2 font-bold text-lg text-primary">
            <x-sampaui::brand-mark />
            <span>Sampa Enterprise</span>
        </div>
    </x-slot:brand>

    <div class="rounded-xl bg-light/80 p-3 text-xs text-secondary/70">
        <p class="font-semibold text-secondary">Armazenamento</p>
        <p class="mt-0.5">8.4 GB de 10 GB usados</p>
    </div>
</x-sampaui::sidebar>
```

## Boas práticas

- Itens e sublinks podem usar `navigate => true` para navegação SPA via `wire:navigate`.
- No mobile (`< 768px`), um backdrop suave é renderizado automaticamente com suporte à tecla `Escape` e clique fora.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento `<aside>` nativo.

