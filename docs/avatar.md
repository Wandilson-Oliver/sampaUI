# Avatar

Imagem ou iniciais de usuario com tamanho, status e fallback.

Imagem ou iniciais de usuario com tamanho, status e fallback. O componente preserva atributos HTML, Alpine e Livewire passados pelo consumidor.

## Uso

```blade
<x-sampaui::avatar name="Ana Souza" />
```

## Propriedades

| Propriedade | Tipo | Padrão | Descrição |
| :--- | :--- | :--- | :--- |
| `src` | `string|null` | `null` | URL da imagem. Quando ausente, usa iniciais. |
| `alt` | `string|null` | `name` | Texto alternativo da imagem. |
| `name` | `string|null` | `null` | Nome usado para alt e iniciais. |
| `size` | `xs|sm|md|lg|xl|2xl` | `md` | Tamanho do avatar e do status. |
| `rounded` | `bool` | `true` | Usa circulo quando true ou raio padrao quando false. |
| `status` | `online|busy|away|offline|null` | `null` | Indicador visual no canto inferior. |

## Exemplos

```blade
<x-sampaui::avatar name="Ana Souza" />
```

## Boas práticas

- Componente visual estatico, seguro em renders Livewire.
- Atributos HTML adicionais (`class`, `id`, `aria-*`, `data-*`) são repassados ao elemento nativo correspondente.
- Use as diretivas oficiais do Blade e Livewire para controle de estado sem mutar o DOM diretamente.
