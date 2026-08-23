# Avatar Upload

Upload circular de avatar com preview, botao de editar e flag de remocao enviada no submit.

Upload circular de avatar com preview, botao de editar e flag de remocao enviada no submit. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::avatar-upload name="avatar" label="Foto" wire:model="avatar" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `name` | `string|null` | `avatar` | Nome do arquivo e chave de erro. |
| `label` | `string|null` | `null` | Label associado ao input de arquivo. |
| `src` | `string|null` | `null` | Imagem atual exibida antes da troca. |
| `alt` | `string|null` | `label` | Texto alternativo da imagem. |
| `size` | `sm|md|lg|xl|2xl` | `xl` | Tamanho do preview circular. |
| `accept` | `string|null` | `image/*` | Tipos aceitos pelo input nativo. |
| `placeholder` | `string` | `No Image` | Texto quando nao ha imagem. |
| `help` | `string|null` | `null` | Texto auxiliar opcional abaixo do avatar. |
| `hint` | `string|null` | `null` | Texto informativo auxiliar posicionado abaixo do componente. |
| `remove-name` | `string|null` | `name_remove` | Nome do hidden enviado como `1` quando a imagem for removida. Gerado automaticamente pelo `name`. |
| `remove-model` | `string|null` | `wireModelRemove` | Propriedade Livewire sincronizada com a flag de remocao. Gerada automaticamente a partir de `wire:model` quando existir. |
| `remove-label` | `string` | `Remover imagem` | Label acessivel do botao de remover. |
| `upload-label` | `string` | `Selecionar imagem` | Label acessivel do botao de upload. |
| `error` | `string|null` | `null` | Mensagem manual ou ErrorBag. |
| `disabled` | `bool` | `false` | Desabilita a selecao e remocao. |
| `loading` | `bool` | `false` | Exibe spinner ou estado de carregamento durante requisições. |
| `loading-target` | `string|null` | `null` | Ação do Livewire monitorada para feedback de loading (wire:target). |
| `required` | `bool` | `false` | Adiciona indicador de obrigatoriedade e validação nativa. |

## Exemplos

```blade
<x-sampaui::avatar-upload name="avatar" label="Foto" wire:model="avatar" />
```

## Boas práticas

- Use com wire:model para uploads do Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
