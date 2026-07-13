# SampaUI v0.1.26

DatePicker seguro em containers com overlay e scroll, sem regressao de bootstrap.

- Calendario e teletransportado para o `body`, com `position: fixed` e camada acima do Modal ou Drawer ativo.
- Abertura reposiciona em scroll e resize, inclusive acima do trigger quando faltar espaco abaixo.
- O estado Alpine permanece autocontido no componente, sem depender de `window.SampaUI`.
