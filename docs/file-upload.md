# File Upload

Use para anexos, contratos, imagens e midias.

A area de selecao usa borda tracejada `border-secondary/40` por padrao.

```blade
<x-sampaui::file-upload
    name="photos[]"
    label="Fotos"
    accept="image/*"
    multiple
    preview
    wire:model="photos"
/>
```

## Props

- `name`, `label`, `accept`.
- `multiple`: permite varios arquivos.
- `preview`: mostra previews locais quando possivel e permite remover imagens antes de salvar.
- `error`, `disabled`, `required`.

O input real preserva atributos Livewire e HTML. Ao remover um item do preview, o componente tambem atualiza o `FileList` do input e dispara eventos para sincronizar formularios e Livewire.

Para uploads Livewire, use somente `wire:model`; nao informe `value`, pois inputs de arquivo nao aceitam valor inicial.

## Inicializacao e ciclo de vida

Em projetos que fazem bundle manual do Livewire, importe `sampaui.js` de forma estatica antes de `Livewire.start()`. Isso garante que os controladores Alpine do upload estejam disponiveis desde a primeira renderizacao.

Os previews locais sao liberados quando o componente Alpine e destruido e no encerramento da pagina. O handler de `beforeunload` e protegido para nao avaliar uma funcao que ja saiu do escopo em navegacoes Livewire.

Crop e reordenacao de galeria ainda nao fazem parte da API do componente. Mantenha essas transformacoes no backend ou em um fluxo dedicado ate que o pacote ofereca um contrato seguro para arquivos temporarios e sincronizacao Livewire.

## Progresso e validacao

`max-size` valida KB por arquivo; `accept` e validado antes do upload. Cada arquivo exibe progresso e estado. `retry` habilita a acao `file-upload:retry`; cancelamento usa `cancelUpload` do Livewire. `chunk-size` publica `file-upload:chunks-ready` para backends que implementem upload em partes, sem impor dependencia ao pacote.
