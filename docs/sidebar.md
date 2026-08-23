# Sidebar

Navegacao lateral responsiva de 18rem, sem faixa externa, com estados hover/ativo circulares e saida outline danger.

Use em areas autenticadas e dashboards. A Sidebar nao cria fundo fora da superficie principal; o item ativo reutiliza o circulo do hover, o gap entre icone e texto e 30% menor, e a saida usa outline danger sem sombra.

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
| `items` | `array` | `[]` | Links principais do menu. |
| `sections` | `array` | `[]` | Grupos adicionais com `label` e `items`. |
| `user` | `array|null` | `null` | Dados opcionais: `name`, `email`, `avatar`. |
| `avatar` | `string|null` | `null` | Atalho para avatar do usuario quando preferir nao passar `user[avatar]`. |
| `avatar-alt` | `string|null` | `user.name` | Texto alternativo da imagem do avatar. |
| `initial-state` | `open|closed|collapsed|null` | `null` | Define se a sidebar inicia aberta ou recolhida. `closed` e `collapsed` sao equivalentes. |
| `collapsed` | `bool` | `false` | Alias legado para iniciar recolhida. Em novos usos, prefira `initial-state="closed"`. |
| `collapsible` | `bool` | `true` | Exibe botao flutuante para recolher ou expandir. |
| `close-event` | `string` | `sampaui:sidebar-close` | Evento Alpine para fechar no mobile. |
| `open-event` | `string` | `sampaui:sidebar-open` | Evento Alpine para abrir no mobile. |
| `state-event` | `string` | `sampaui:sidebar-state` | Evento emitido ao iniciar, abrir, fechar ou recolher. Use para ajustar `margin-left` do conteudo. |
| `active-color` | `string` | `primary` | Cor de destaque do item ativo. |
| `logout-href` | `string|null` | `null` | Exibe link de saida quando informado. |
| `logout-label` | `string` | `Sair` | Rótulo acessível do botão de logout. |
| `position` | `fixed|static` | `fixed` | Use `static` apenas quando a sidebar participar de um container ou preview; dashboards usam `fixed`. |

## Slots

- `footer`

## Exemplos

```blade
<x-sampaui::sidebar logo-src="/images/logo.svg" :items="$items" />
```

## Boas práticas

- Itens podem usar wire:navigate.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
