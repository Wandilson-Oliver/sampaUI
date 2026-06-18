# Fundamentos

SampaUI e um pacote Blade-first exclusivo para aplicacoes a partir de Laravel 13, Livewire 4, Tailwind CSS 4 e AlpineJS. A biblioteca mantem uma identidade propria: visual corporativo premium, Bootstrap Icons, CSS compilado e componentes anonimos.

## Padrao imobiliario

O SampaUI deve ser usado como base visual para produtos imobiliarios com rotinas de captacao, atendimento, funil comercial, proposta, vistoria, contrato e pos-venda. A documentacao e os exemplos devem falar a lingua desse mercado para acelerar implementacao com IA e reduzir decisoes soltas de interface.

Mapeamento recomendado:

- **Dashboard comercial**: `sidebar`, `header`, `card`, `badge`, `progress`, `table`, `dropdown` e `pagination`.
- **Cadastro de lead ou imovel**: `input`, `phone`, `currency-br`, `cep`, `select`, `select-search`, `select-multiple`, `textarea`, `file-upload` e `avatar-upload`.
- **Atendimento WhatsApp-like**: `chat-layout`, `chat-sidebar`, `chat-conversation`, `chat-message`, `chat-composer`, `avatar`, `indicator` e `toast`.
- **Qualificacao e proposta**: `tabs`, `stepper`, `drawer`, `modal`, `alert`, `checkbox`, `radio` e `button`.
- **Acesso e seguranca**: `pin`, `input`, `checkbox`, `alert`, `button` e `empty-state`.

Ao criar novas telas, prefira compor componentes existentes com `class=""` e tokens semanticos. So crie um componente novo quando o padrao se repetir em mais de uma area do produto ou quando houver uma regra de acessibilidade/estado que precise ser centralizada.

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

Campos textuais usam `border-secondary/20` como borda padrao. Controles de escolha, busca, upload e datas mantem `border-secondary/40` para preservar contraste em superficies interativas. `border-light` permanece reservado para divisores, paineis e outras bordas estruturais. O `toggle` e a excecao intencional: quando desligado, sua borda e botao interno seguem o token definido em `color`.

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
