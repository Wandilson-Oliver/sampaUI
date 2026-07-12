# SampaUI v0.1.25

Estabilizacao dos menus teletransportados de Select.

- Referencias estaveis por ID substituem `$refs.menu` apos teleport.
- Menus usam `position: fixed`, coordenadas do trigger e camada do overlay ativo.
- Estado inicial inline evita que `x-cloak` mantenha o menu oculto depois do teleport.
