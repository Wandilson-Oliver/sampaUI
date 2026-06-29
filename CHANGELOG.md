# Changelog

Todas as mudanças notáveis do SampaUI serão documentadas neste arquivo.

## v0.1.19 - 2026-06-28

### Adicionado

- Nova paleta padrao com tokens de marca e suporte explicito a `surface`, `border` e `text`.
- `table-search` separa listagens com pesquisa do `table` simples sem remover a API anterior.
- `brand-mark` aceita logo, texto, link e tamanhos.
- Header ganhou busca, notificacoes e modo sticky opcionais.

### Melhorado

- Sidebar branca alinhada a referencia, sem trilho cinza por padrao, com modo `static` para containers e previews.
- Card aproxima o conteudo do header em `15px`.
- Componentes de chat ganharam navegacao mobile, auto-resize, auto-scroll, estados vazios, typing, links e status de entrega.

### Corrigido

- Modal nao depende mais do `<dialog>` remontado fechado pelo Livewire.
- Modal e Drawer usam a camada do `body`; Drawers entram e saem pela mesma borda da viewport.
- Modal e Drawer mantêm uma identidade estável entre renders Livewire, evitando que o portal abra e feche sozinho.
- Drawer usa transições mais suaves de entrada e saída, preservando o fechamento pela mesma borda da viewport.
- Pipeline npm usa lockfile versionado e os metadados Composer deixam a versão pública sob responsabilidade das tags Git.

## v0.1.18 - 2026-06-25

### Documentação

- Versão do pacote atualizada para acompanhar a documentação premium com playgrounds reais e catálogo mais espaçado.

## v0.1.17 - 2026-06-25

### Melhorado

- `select`, `select-search`, `select-multiple` e `date-picker` agora usam a mesma linguagem visual dos inputs, com `border-secondary/20`, hover suave e foco `focus:ring-primary/20`.
- `table` evoluiu para um DataTable leve com toolbar, busca, selecao em massa, export link, paginacao, skeleton loading e empty state premium, mantendo a API atual de `columns` e `rows`.

### Documentação

- Registry, README, fundamentos e docs dos componentes foram atualizados para refletir os novos contratos de forms e DataTable.

## v0.1.16 - 2026-06-20

### Adicionado

- Wrapper `field` para label, hint, indicador obrigatorio e erro acessivel sem duplicacao nos controles.
- Navegacao por teclado, limpeza e estados premium em Select e Select Multiple.
- Progresso por arquivo, validacao de tipo/tamanho, cancelamento e hooks opcionais de retry/chunks no File Upload.

### Melhorado

- Inputs, Phone, Checkbox, Textarea, Toggle, Avatar Upload e selects agora associam `aria-invalid`, `aria-describedby`, label e foco de forma consistente, preservando `wire:model` no controle real.
- Modal, Drawer e Dropdown passaram a usar controladores Alpine externos, focus trap, retorno de foco, Esc e click-outside configuraveis.
- Toast ganhou fila, limite de itens visiveis, timer pausavel por mouse/foco, live regions por severidade e variantes `soft`, `solid` e `outline`.
- Badge e Card ganharam aparencias consistentes; Table recebeu header sticky e fallback mobile em cards; Pagination ganhou modo compacto; Header ganhou slots `left`, `center` e `right`.
- Toast aceita os eventos `toast` e `sampaui:toast`; Phone combina mascara e limpeza sem sobrescrever listeners; Header preserva rotulo acessivel com slot `left` customizado.

### Testes

- Cobertura de contratos de renderizacao, atributos Livewire, acessibilidade basica, estados premium e responsividade estrutural.

## v0.1.15 - 2026-06-18

### Melhorado

- `input` passa a usar borda padrao `border-secondary/20`, mantendo foco, erro e estados desabilitados.
- `badge` ganhou tamanho `xs` e tamanhos revisados com padding, gap, tipografia e altura de linha consistentes.

## v0.1.14 - 2026-06-11

### Melhorado

- Documentacao revisada para padronizar o SampaUI em produtos digitais: CRM, funil comercial, atendimento, propostas, dashboards e auth.
- README, fundamentos e catalogo de componentes receberam receitas copiaveis orientadas a Laravel, Livewire e agentes de IA.
- Registry exportado passa a refletir a versao publica `0.1.14`.

## v0.1.13 - 2026-06-11

### Melhorado

- Adicionados componentes de chat: `chat-layout`, `chat-sidebar`, `chat-conversation`, `chat-message` e `chat-composer`.
- `dropdown` ganhou a prop `placement`, permitindo abrir o menu para cima em linhas finais de tabelas e containers com rolagem.

### Corrigido

- `modal` agora usa `<dialog>` nativo com top layer do navegador, garantindo que backdrop e painel fiquem acima de sidebars, topbars e containers com `overflow`.

## v0.1.12 - 2026-06-11

### Corrigido

- `modal` agora mantém o overlay dentro do componente Livewire com um unico escopo Alpine, evitando perda de `wire:id` e falhas de estado ao abrir modais em telas interativas.

## v0.1.11 - 2026-06-11

### Corrigido

- `modal` agora mantém o escopo Alpine dentro do conteúdo teletransportado para evitar erros `visible`/`active` indefinidos ao abrir modais em telas Livewire.

## v0.1.10 - 2026-06-11

### Melhorado

- `select` agora usa combobox Alpine com dropdown customizado, `shadow-2xl` e sincronizacao com `<select>` real oculto.
- `select-search` e `select-multiple` agora exibem dropdown com sombra `2xl`.
- `table` ganhou ordenacao opt-in por coluna via `sortable`, `sort-by`, `sort-direction` e `sort-method`.
- `modal` passou a revelar o painel a partir do canto superior direito.
- `header` mantem acoes na frente do titulo em telas medias e grandes.

### Testes

- Cobertura dos contratos do `select`, ordenacao do `table`, sombras dos dropdowns, animacao do `modal` e responsividade do `header`.

## v0.1.9 - 2026-06-06

### Adicionado

- Registry oficial de componentes em `resources/metadata/components.php`, com export estatico em `docs/registry/components.json`.
- Arquivos `llms.txt` e `llms-full.txt` para Codex e outras ferramentas de IA entenderem stack, componentes, tokens e exemplos.
- Comandos `sampaui:list`, `sampaui:about`, `sampaui:doctor` e `sampaui:docs-export`.
- GitHub Actions para testes PHP, build de assets e checagem de drift do registry exportado.

### Melhorado

- `AGENTS.md` reforcado com workflow operacional para criar, documentar, testar e versionar componentes.
- README e documentacao atualizados para explicar registry, comandos e uso por agentes.

### Corrigido

- `cep` agora formata `12345678` como `12345-678` internamente, sem depender de plugin externo de mascara.
- `phone` tambem passa a usar mascara interna para manter consistencia com os campos formatados.

### Testes

- Cobertura para comandos Artisan, registry de componentes e drift do JSON exportado.

## v0.1.8 - 2026-06-06

### Corrigido

- `toggle` reestruturado para manter track e knob visiveis em todos os estados, sem depender de variantes arbitrarias no pai.
- O estado desligado do `toggle` preserva borda e knob com a cor escolhida, enquanto o estado ligado usa fundo colorido e knob contrastante.

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
