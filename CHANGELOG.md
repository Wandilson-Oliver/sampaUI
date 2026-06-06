# Changelog

Todas as mudanças notáveis do SampaUI serão documentadas neste arquivo.

## v0.1.7 - 2026-06-06

### Melhorado

- `toggle` agora aplica a cor definida em `color` na borda e no botao interno quando esta desligado.
- Documentacao do `toggle` atualizada para explicar a diferenca visual entre estados ligado e desligado.
- Componentes com mascara permanecem registrados na documentacao do pacote e receberam ajuste no catalogo visual da documentacao local.

### Testes

- Cobertura dos estados desligados coloridos do `toggle`.

## v0.1.6 - 2026-06-06

### Adicionado

- Novo componente `cep` com mascara `99999-999`, `autocomplete="postal-code"` e suporte direto a `wire:model`.
- Documentacao markdown para `phone`, `currency-br` e `cep`, com exemplos no indice de componentes.

### Melhorado

- Componentes `phone` e `currency-br` padronizados para usar `x-sampaui::input`, Bootstrap Icons e tokens semanticos do pacote.
- Borda padrao dos controles de formulario alterada de `border-secondary/50` para `border-secondary/40`.

### Testes

- Cobertura para componentes com mascara e para a nova borda padrao em todos os controles de formulario.

## v0.1.5 - 2026-06-05

### Adicionado

- Novo componente `pin` para codigos curtos, 2FA e verificacoes com suporte a `wire:model`, `x-modelable`, mascaras de numeros/letras, limpeza e envio automatico com `smart`.
- Novo componente `select-multiple` com busca local, tags removiveis, opcoes desabilitadas, estados de erro/loading/disabled e sincronizacao bidirecional com Livewire.
- Documentacao markdown e exemplos no indice de componentes para `pin` e `select-multiple`.

### Testes

- Cobertura de renderizacao, atributos Livewire/Alpine, estados visuais e acessibilidade para os novos componentes.

## v0.1.4 - 2026-06-05

### Adicionado

- Novo componente `avatar-upload` com preview local, placeholder circular `No Image`, upload por botao de lapis e remocao automatica quando existe imagem atual ou preview.
- Documentacao markdown do `avatar-upload` e entrada no indice de componentes.

### Melhorado

- `file-upload` agora permite remover imagens diretamente do preview local.
- Componentes de upload receberam cobertura de testes para remocao e estados de preview.

## v0.1.3 - 2026-06-04

### Corrigido

- `select-search` agora usa `border-secondary/50` tanto no trigger principal quanto no campo de busca interno.
- Bordas padrao de `checkbox`, `radio`, `toggle`, `date-picker` e `file-upload` foram alinhadas aos demais componentes de formulario.

### Testes

- Adicionada cobertura consolidada para garantir `border-secondary/50` em todos os componentes de formulario.

## v0.1.2 - 2026-06-04

### Adicionado

- Suporte a `href` no componente `button`, incluindo `wire:navigate` e estado disabled acessivel.

### Melhorado

- Borda padrao de campos nativos alterada para `border-secondary/50`, com contraste aproximadamente 50% mais escuro.
- `select-search` e `date-picker` agora usam `x-modelable` para inicializacao e sincronizacao bidirecional com Livewire.
- Documentacao dos componentes de entrada esclarece que `wire:model` funciona sem a prop `value`.

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
