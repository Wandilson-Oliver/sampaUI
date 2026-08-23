# Upload de arquivo

Area de selecao com borda tracejada `border-secondary/40`, label, erro, accept e suporte a multiplos arquivos, com cleanup seguro de previews locais.

Area de selecao com borda tracejada `border-secondary/40`, label, erro, accept e suporte a multiplos arquivos, com cleanup seguro de previews locais. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::file-upload name="contract" label="Contrato" wire:model="contract" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `name` | `string|null` | `null` | Nome do campo e chave de erro. |
| `label` | `string|null` | `null` | Label associado ao input. |
| `accept` | `string|null` | `null` | Tipos aceitos pelo input nativo. |
| `multiple` | `bool` | `false` | Permite selecionar multiplos arquivos. |
| `preview` | `bool` | `false` | Exibe preview local de imagens selecionadas, libera URLs no destroy/beforeunload e permite remover itens antes de salvar. Crop e reordenacao nao fazem parte da API. |
| `hint` | `string|null` | `null` | Texto informativo auxiliar posicionado abaixo do componente. |
| `disabled` | `bool` | `false` | Desabilita a selecao. |
| `loading` | `bool` | `false` | Exibe spinner ou estado de carregamento durante requisições. |
| `loading-target` | `string|null` | `null` | Ação do Livewire monitorada para feedback de loading (wire:target). |
| `required` | `bool` | `false` | Adiciona indicador de obrigatoriedade e validação nativa. |
| `error` | `string|null` | `null` | Mensagem manual ou ErrorBag. |
| `max-size` | `int|null` | `null` | Tamanho máximo permitido em Megabytes (MB). |
| `retry` | `bool` | `false` | Habilita botão de tentar novamente em falhas de upload. |
| `chunk-size` | `int|null` | `null` | Tamanho do bloco em bytes para uploads fragmentados. |
| `type-error` | `string|null` | `null` | Mensagem para formatos de arquivos inválidos. |
| `size-error` | `string|null` | `null` | Mensagem para arquivos que excedem o tamanho máximo. |
| `cancel-label` | `string` | `Cancelar` | Rótulo do botão de cancelar upload. |
| `retry-label` | `string` | `Tentar novamente` | Rótulo do botão de reenvio. |

## Exemplos

```blade
<x-sampaui::file-upload name="contract" label="Contrato" wire:model="contract" />
```

## Boas práticas

- Importe o SampaUI antes de Livewire.start(); previews sao limpos no destroy e em beforeunload protegido.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
