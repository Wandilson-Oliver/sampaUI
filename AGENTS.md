# AGENTS.md

# Projeto

SAMPAUI é um pacote UI para:

- Laravel 13+
- Livewire 4+
- TailwindCSS 4+
- AlpineJS
- PHP 8.3+

Objetivo:

Criar componentes premium reutilizáveis para Laravel.

---

# Workflow obrigatorio para agentes

Sempre consulte a documentacao oficial antes de alterar arquitetura, instalacao ou comportamento Livewire/Laravel:

- https://laravel.com/docs/13.x/documentation
- https://laravel.com/docs/13.x/packages
- https://livewire.laravel.com/docs/4.x/quickstart
- https://livewire.laravel.com/docs/4.x/forms

Ao criar ou alterar um componente, atualize no mesmo change set:

- `resources/views/components/{slug}.blade.php`
- `resources/metadata/components.php`
- `docs/{slug}.md`
- `docs/components.md`, quando o componente for novo
- `docs/registry/components.json`, via `php artisan sampaui:docs-export --format=json`
- `llms-full.txt`, quando a API publica mudar
- testes em `tests/Feature`
- `CHANGELOG.md`

Antes de commit:

```bash
composer test
npm run build
git diff --check
```

Para componentes de formulario:

- preservar `wire:*`, `x-*`, `class=""`, `id`, `name`, `disabled`, `error` e atributos HTML validos no controle real;
- usar `border-secondary/40` como borda padrao;
- manter foco com tokens oficiais, por exemplo `focus:ring-primary/20`;
- campos com mascara devem formatar internamente quando possivel, sem exigir plugin externo se a logica for simples;
- sincronizar Alpine/Livewire apos formatacao com `$el._x_model.set($el.value)` quando o valor for alterado por JavaScript.

Para documentacao e IA:

- `resources/metadata/components.php` e a fonte de verdade do catalogo publico;
- `docs/registry/components.json` e o export estatico para ferramentas;
- `llms.txt` deve ser curto e orientado a descoberta;
- `llms-full.txt` deve conter stack, instalacao, tokens, workflow e catalogo de componentes;
- nunca deixar componente novo sem Blade, doc markdown, registry e teste de contrato.

Inspirado em:

- FluxUI
- Shadcn
- Filament
- Radix UI
- Headless UI

---

# Filosofia visual

SAMPAUI deve parecer:

✓ Premium  
✓ Arquitetura  
✓ Imobiliária  
✓ Corporativo moderno  
✓ Elegante  
✓ Sofisticado  

Evitar:

✗ Bootstrap visual  
✗ AdminLTE  
✗ Material Design  
✗ Interfaces exageradas  

---

# Paleta oficial

Usar a paleta semantica personalizada do SampaUI como fonte unica de verdade:

```txt
primary, secondary, accent, danger, light, surface, success, warning, info, purple, muted, border, text
```

As cores ficam declaradas em `config/sampaui.php` e refletidas no CSS compilado do pacote.

---

# Tailwind Theme

Nao criar uma segunda paleta, tema paralelo ou tokens concorrentes.
O pacote deve usar somente os tokens semanticos oficiais do SampaUI.

Base obrigatoria:

```css
@import "tailwindcss";
```

---

# Permitido nos componentes

Usar:

```blade
bg-primary

text-secondary

bg-accent

border-border

rounded-default

shadow-xl
```

Evitar:

```blade
bg-[custom-hex]
```

quando existir token semantico oficial equivalente.

---

# Proibido

Nunca criar:

```css
.button{}
.card{}
```

Nunca criar:

```txt
theme.css

components.css

tokens.css

tema CSS paralelo

classes semanticas novas de cor, borda ou raio fora da paleta oficial
```

Nunca usar:

SCSS

Bootstrap CSS

CSS Modules

---

# Estrutura obrigatória

```txt
src/

resources/
    css/
        sampaui.css

    views/
        components/

config/

tests/

docs/
```

---

# Bootstrap Icons

Biblioteca oficial:

```txt
Bootstrap Icons
```

Instalação:

```bash
npm install bootstrap-icons
```

Uso obrigatório:

```blade
<i class="bi bi-plus"></i>
```

Nunca usar:

Heroicons

Lucide

FontAwesome

---

# Componentes Blade

Todos os componentes devem permitir customização usando:

```blade
class=""
```

Usuário deve conseguir:

```blade
<x-sampaui::button
class="w-full">

Salvar

</x-sampaui::button>
```

ou:

```blade
<x-sampaui::button
class="bg-danger rounded-full shadow-none">

Salvar

</x-sampaui::button>
```

sem quebrar o componente.

---

Implementação obrigatória:

Sempre usar:

```blade
{{

$attributes->merge([

'class'=>

'

bg-primary

text-white

rounded-default

px-4
py-2

transition

'

])

}}
```

Nunca:

```blade
<button class="">
```

fixo.

---

Usuário deve conseguir sobrescrever:

Cor:

```blade
class="bg-danger"
```

Radius:

```blade
class="rounded-full"
```

Shadow:

```blade
class="shadow-none"
```

Padding:

```blade
class="px-10 py-5"
```

Largura:

```blade
class="w-full"
```

Responsividade:

```blade
class="md:w-auto"
```

Estados:

```blade
class="hover:scale-105"
```

---

# API dos componentes

Todo componente deve possuir API consistente.

Exemplo:

```blade
<x-sampaui::button
variant=""
size=""
icon=""
icon-position=""
rounded=""
loading=""
disabled=""
full=""
>
```

---

# BUTTON

Componente:

```blade
<x-sampaui::button />
```

Props obrigatórias:

```php
variant:
primary
secondary
accent
danger
outline
ghost
light


size:
sm
md
lg
xl
2xl


icon:
string|null


iconPosition:
left
right


rounded:
bool


loading:
bool


disabled:
bool


full:
bool
```

---

# Variantes obrigatórias

Primary:

```txt
bg-primary

text-white

hover:opacity-90
```

Secondary:

```txt
bg-secondary

text-white
```

Accent:

```txt
bg-accent

text-white
```

Danger:

```txt
bg-danger

text-white
```

Light:

```txt
bg-light

text-secondary
```

Ghost:

```txt
bg-transparent

hover:bg-light/30
```

Outline:

```txt
bg-transparent

border

border-primary

text-primary

hover:bg-primary

hover:text-white
```

---

# Tamanhos obrigatórios

SM:

```txt
px-3
py-2

text-sm
```

MD:

```txt
px-4
py-2.5

text-base
```

LG:

```txt
px-5
py-3

text-lg
```

XL:

```txt
px-6
py-4

text-xl
```

2XL:

```txt
px-8
py-5

text-2xl
```

---

# Botão apenas ícone

SM:

```txt
w-8
h-8
```

MD:

```txt
w-10
h-10
```

LG:

```txt
w-12
h-12
```

XL:

```txt
w-14
h-14
```

2XL:

```txt
w-16
h-16
```

Adicionar:

```txt
aspect-square
```

---

# Rounded

Botão redondo:

```blade
<x-sampaui::button
rounded>
```

Adicionar:

```txt
rounded-full
```

---

Botão apenas ícone + rounded:

Adicionar:

```txt
rounded-full

aspect-square
```

---

# Ícones

Botão com ícone:

```blade
<x-sampaui::button
icon="plus">

Adicionar

</x-sampaui::button>
```

Resultado:

```html
<i class="bi bi-plus"></i>
```

---

Ícone direita:

```blade
<x-sampaui::button
icon="arrow-right"

icon-position="right">

Continuar

</x-sampaui::button>
```

---

Botão apenas ícone:

```blade
<x-sampaui::button
icon="trash"/>
```

Resultado:

```html
<button>

<i class="bi bi-trash"></i>

</button>
```

---

# Loading

Suportar:

```blade
<x-sampaui::button
loading>
```

Mostrar:

```html
<i class="bi bi-arrow-repeat animate-spin"></i>
```

---

# Disabled

Adicionar:

```txt
opacity-50

pointer-events-none
```

---

# Full width

Adicionar:

```txt
w-full
```

---

# Exemplos válidos

Simples:

```blade
<x-sampaui::button>

Salvar

</x-sampaui::button>
```

Outline:

```blade
<x-sampaui::button
variant="outline">

Salvar

</x-sampaui::button>
```

Grande:

```blade
<x-sampaui::button
size="2xl">

Adicionar conta

</x-sampaui::button>
```

Com ícone:

```blade
<x-sampaui::button
icon="plus">

Adicionar

</x-sampaui::button>
```

Rounded:

```blade
<x-sampaui::button

variant="outline"

icon="plus"

rounded

/>
```

Customizado:

```blade
<x-sampaui::button

variant="accent"

size="2xl"

icon="plus"

rounded

class="

w-full

shadow-none

bg-danger

"

>

Salvar

</x-sampaui::button>
```

---

# Radius

Preferir:

```txt
rounded-default

rounded-lg

rounded-full
```

Evitar:

```txt
rounded-none
```

---

# Sombras

Preferir:

```txt
shadow-sm

shadow-xl
```

Evitar:

```txt
shadow-2xl
```

---

# Livewire

Todo componente deve suportar:

```blade
wire:model

wire:model.live

wire:click

wire:loading

wire:navigate
```

---

# AlpineJS

Permitido:

```html
x-data

x-show

x-transition

x-on
```

Evitar lógica complexa.

Priorizar Livewire.

---

# Acessibilidade

Todo componente deve considerar:

aria-label

tabindex

focus

keyboard navigation

role

---

# Performance

Evitar:

JS pesado

Dependências externas

Loops desnecessários

Priorizar:

Blade

Livewire

Tailwind

Alpine

---

# Componentes prioritários

Criar nesta ordem:

1 Button

2 Input

3 Select

4 Textarea

5 Checkbox

6 Radio

7 Card

8 Modal

9 Drawer

10 Dropdown

11 Alert

12 Toast

13 Table

14 Pagination

15 DatePicker

16 Upload

17 Tabs

18 Accordion

---

# Documentação

Todo componente precisa:

1 componente blade

1 teste

1 documentação

Exemplo:

```txt
resources/views/components/button.blade.php

tests/ButtonTest.php

docs/button.md
```

---

# Nome dos componentes

Sempre:

```blade
<x-sampaui::button />

<x-sampaui::input />

<x-sampaui::modal />
```

Nunca:

```blade
<x-button />

<x-ui-button />
```

---

# Regra principal

Sempre preferir:

Tailwind utilities

+

Bootstrap Icons

ao invés de:

CSS customizado

O agente deve gerar:

```blade
bg-primary

rounded-default

shadow-xl
```

e evitar:

```css
.button{}
```

---

# Fluxo obrigatório após criar ou alterar componentes

Após criar ou alterar qualquer componente do SAMPAUI, o agente deve obrigatoriamente usar o repositório:

```txt
sampaui-documentation
```

para:

1. Instalar/testar o componente no ambiente de documentação.
2. Rodar o projeto no navegador.
3. Validar visualmente o componente.
4. Criar ou atualizar a página de documentação do componente.
5. Adicionar exemplos reais de uso.
6. Garantir que o componente funcione com:
   - Laravel 13+
   - Livewire 4+
   - TailwindCSS 4+
   - AlpineJS
   - Bootstrap Icons

---

# Repositório de documentação

O repositório:

```txt
sampaui-documentation
```

é o ambiente oficial para testar visualmente os componentes do pacote.

Sempre que um componente for criado ou alterado, criar/atualizar a documentação correspondente.

Exemplo:

```txt
sampaui-documentation/resources/views/docs/components/button.blade.php
```

ou estrutura equivalente já existente no projeto.

---

# Documentação obrigatória por componente

Toda página de documentação deve conter:

1. Nome do componente
2. Descrição curta
3. Instalação ou importação, se necessário
4. Uso básico
5. Props disponíveis
6. Variants
7. Sizes
8. Exemplos com ícone
9. Exemplo com `class=""`
10. Exemplo com Livewire
11. Exemplo com AlpineJS, se aplicável

---

# Exemplo de documentação esperada

Para o botão:

```blade
<x-sampaui::button>
Salvar
</x-sampaui::button>
```

Com variante:

```blade
<x-sampaui::button variant="outline">
Salvar
</x-sampaui::button>
```

Com tamanho:

```blade
<x-sampaui::button size="2xl">
Adicionar conta
</x-sampaui::button>
```

Com ícone Bootstrap Icons:

```blade
<x-sampaui::button icon="plus">
Adicionar
</x-sampaui::button>
```

Customizado:

```blade
<x-sampaui::button
    variant="accent"
    size="lg"
    icon="briefcase"
    class="w-full shadow-none"
>
    Nova conta
</x-sampaui::button>
```

---

# Validação no navegador

O agente deve validar visualmente no navegador antes de considerar a tarefa concluída.

Verificar:

- Espaçamento
- Cores
- Hover
- Ícones Bootstrap Icons
- Tamanhos
- Responsividade
- Estado disabled
- Estado loading
- Uso de `class=""`
- Compatibilidade com Livewire

---

# Regra de finalização

Nenhum componente deve ser considerado concluído sem:

1. Arquivo Blade criado/alterado
2. Teste criado/alterado
3. Página de documentação criada/alterada no `PACOTE-SAMPAUI/sampaui-documentation`
4. Validação visual no navegador
5. Exemplo de uso documentado
