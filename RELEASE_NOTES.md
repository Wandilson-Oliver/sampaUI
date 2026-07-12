# SampaUI v0.1.22

Correcao de ciclo de vida e inicializacao do File Upload.

- Protege o cleanup de previews no `beforeunload` apos a destruicao de escopos Alpine.
- Libera os previews locais no hook `destroy` do Alpine.
- Documenta a importacao estatica do SampaUI antes de `Livewire.start()` para projetos com bundle manual.
- Mantem crop e reordenacao de galeria fora da API enquanto nao houver sincronizacao segura com uploads temporarios do Livewire.
