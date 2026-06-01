# Command Palette

Use para acoes rapidas em dashboards e sistemas administrativos.

```blade
<x-sampaui::command-palette
    :items="[
        ['label' => 'Novo imovel', 'href' => '/imoveis/create', 'icon' => 'plus'],
        ['label' => 'Ver categorias', 'href' => '/categorias', 'icon' => 'tags'],
    ]"
/>
```

Abra disparando o evento:

```js
window.dispatchEvent(new CustomEvent('sampaui:command-open'))
```

## Acessibilidade

- O campo de busca recebe foco ao abrir.
- O overlay fecha no clique externo.
- Use labels objetivos para cada item de comando.

