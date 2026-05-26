# Fundamentos

SampaUI e um pacote Blade-first exclusivo para aplicacoes a partir de Laravel 13, Livewire 4, Tailwind CSS 4 e AlpineJS. A biblioteca mantem uma identidade propria: visual corporativo premium, tokens oficiais, Bootstrap Icons, CSS compilado e componentes anonimos.

## Principios adotados

- **Blade primeiro**: componentes anonimos em `resources/views/components`, sem exigir classes PHP para uso simples.
- **API previsivel**: props curtas, nomes consistentes e suporte a `class=""`.
- **Base compartilhada**: campos de formulario, triggers e controles booleanos usam helpers internos para manter foco, erro, disabled e cores no mesmo padrao.
- **Acessibilidade por padrao**: labels, `aria-*`, foco visivel, estados disabled e mensagens de erro associadas.
- **Livewire compatível**: atributos `wire:*` e Alpine passam para o elemento correto.
- **Tokens oficiais**: `primary`, `secondary`, `accent`, `danger` e `light`.
- **Documentacao executavel**: exemplos renderizados com o pacote real instalado.

## Padrao 2026 do pacote

- Componentes devem ser simples de chamar e previsiveis de compor.
- Componentes interativos usam Alpine local, sem dependencia JavaScript extra alem do stack oficial.
- Atributos HTML, Alpine e Livewire nao consumidos pelo componente devem continuar no elemento correto.
- Estados `disabled`, `error`, `loading`, `active` e `selected` devem ter semantica e visual consistentes.
- O CSS distribuido continua compilado em `dist/sampaui.css` para instalacao rapida via Composer/Packagist.

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
