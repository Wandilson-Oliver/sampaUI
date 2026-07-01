# SampaUI v0.1.20

Atualizacao de navegacao, tabelas e formularios com foco em consistencia visual e composicao.

- Sidebar alinhada a referencia, reduzida para `18rem`, com logo do cliente por `logo-src`, trilho claro e item ativo circular.
- Table Search ganhou filtros customizados, paginação configuravel e composição flush dentro de Card.
- Inputs e selects exibem erros do Laravel automaticamente a partir de `name` ou `wire:model`.
- Select comum sincroniza valor e label com Livewire por `x-modelable`; Card aceita overflow visivel para dropdowns.
- Checkboxes agrupados geram ids por valor e o Header preserva o titulo quando existem acoes.
