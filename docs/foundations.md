# Fundamentos

SampaUI e um pacote Blade-first exclusivo para aplicacoes a partir de Laravel 13, Livewire 4, Tailwind CSS 4 e AlpineJS. A biblioteca mantem uma identidade propria: visual corporativo premium, Bootstrap Icons, CSS compilado e componentes anonimos.

## Principios adotados

- **Blade primeiro**: componentes anonimos em `resources/views/components`, sem exigir classes PHP para uso simples.
- **API previsivel**: props curtas, nomes consistentes e suporte a `class=""`.
- **Base compartilhada**: campos de formulario, triggers e controles booleanos usam helpers internos para manter foco, erro, disabled e cores no mesmo padrao.
- **Acessibilidade por padrao**: labels, `aria-*`, foco visivel, estados disabled e mensagens de erro associadas.
- **Livewire compatível**: atributos `wire:*` e Alpine passam para o elemento correto.
- **Paleta semantica SampaUI**: usar `primary`, `secondary`, `accent`, `danger`, `light`, `success`, `warning`, `info`, `purple` e `muted` como tokens oficiais.
- **Documentacao executavel**: exemplos renderizados com o pacote real instalado.

## Padrao 2026 do pacote

- Componentes devem ser simples de chamar e previsiveis de compor.
- Componentes interativos usam Alpine local, sem dependencia JavaScript extra alem do stack oficial.
- Atributos HTML, Alpine e Livewire nao consumidos pelo componente devem continuar no elemento correto.
- Estados `disabled`, `error`, `loading`, `active` e `selected` devem ter semantica e visual consistentes.
- O CSS distribuido continua compilado em `dist/sampaui.css` para instalacao rapida via Composer/Packagist.

## Paleta oficial

Os tokens ficam centralizados em `config/sampaui.php` e no CSS do pacote:

| Token | Uso recomendado |
| --- | --- |
| `primary` | acao principal, foco, links e elementos ativos |
| `secondary` | texto principal, navegacao e superficies escuras |
| `accent` | destaques, avisos leves e chamadas secundarias |
| `danger` | erros, destruicao, pendencias criticas |
| `light` | fundo claro, divisores e estados hover suaves |
| `success` | sucesso, online, confirmacoes |
| `warning` | alerta operacional e atencao |
| `info` | mensagens informativas |
| `purple` | destaque alternativo e dados especiais |
| `muted` | estados neutros e secundarios |

Use classes semanticas como `bg-primary`, `text-secondary`, `border-light`, `bg-accent/10` e `focus:ring-primary/20`. Evite hexadecimais diretos em componentes quando um token oficial resolver o caso.

Componentes de formulario usam `border-secondary/50` como borda padrao para manter contraste consistente. `border-light` permanece reservado para divisores, paineis e outras bordas estruturais.

## Variantes padronizadas

- `Button`: `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted`, `light`, `ghost`, `outline`.
- `Badge`, `Progress` e controles: `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`, `muted`, `light`.
- `Alert`: `success`, `danger`/`error`, `warning`, `info`.
- `Card` e `Drawer`: `default`, `muted`, `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info`, `purple`.

Variantes invalidas devem voltar para o estado principal ou padrao sem quebrar a renderizacao.

## Referencias aplicadas

- shadcn/ui: exemplos copiaveis e composicao.
- Radix UI: foco em acessibilidade e estados.
- Material UI: props consistentes para variantes e tamanhos.
- Ant Design: orientacao para produtos corporativos.
- Chakra UI: tokens e customizacao local.
- Mantine: documentacao objetiva por estado.
- Headless UI: controle do consumidor sobre markup e Tailwind.
- daisyUI: classes semanticas orientadas a tema.
- Flowbite: componentes prontos para Tailwind.
- Bootstrap: familiaridade ampla e Bootstrap Icons.
