# Changelog

Todas as mudanças notáveis do SampaUI serão documentadas neste arquivo.

## v0.1.1 - 2026-06-02

### Adicionado

- Entrypoint `dist/sampaui.js` com registro `window.SampaUI`.
- Fontes do Bootstrap Icons publicadas em `dist/fonts`, permitindo uso dos ícones junto ao CSS compilado do pacote.
- Opção `--skip-frontend` no comando `sampaui:install`.

### Melhorado

- `sampaui:install` agora registra automaticamente os imports do SampaUI em `resources/css/app.css` e `resources/js/app.js` para compilar junto ao Vite do app consumidor.
- Componente `input` com `type="password"` agora renderiza botão funcional de mostrar/ocultar senha por padrão.
- Documentação markdown de instalação, input, badge, skeleton e command palette com exemplos mais completos.
- `dropdown` recebeu camada superior para evitar sobreposição incorreta em previews e layouts com cards.

### Corrigido

- CSS compilado não depende mais de `@import` de fonte dentro de `dist/sampaui.css`, evitando warning ao ser importado pelo `app.css` do consumidor.

## v0.1.0 - 2026-06-01

### Adicionado

- Paleta semântica oficial do SampaUI com tokens `primary`, `secondary`, `accent`, `danger`, `light`, `success`, `warning`, `info`, `purple` e `muted`.
- Documentação markdown dos componentes e fundamentos do pacote.
- Componente `brand-mark`.
- Suporte a `icon`, `prefix` e `suffix` no componente `input`.
- Testes para variantes, slots, atributos preservados, estados visuais e componentes compostos.

### Melhorado

- Consistência visual de botões, badges, cards, alertas, sidebar, drawer, toast, progress, inputs e componentes operacionais.
- Helpers internos para centralizar classes de variantes, superfícies, campos e estados.
- Acessibilidade em estados de foco, erro, disabled e elementos interativos.
- CSS compilado do pacote para Tailwind CSS 4.

### Documentação

- Guia de instalação e checklist de release.
- Guia de fundamentos com paleta oficial e uso seguro de customização via `class=""`.
- Exemplos de uso com Laravel 13, Livewire 4, Tailwind CSS 4, AlpineJS e Bootstrap Icons.
