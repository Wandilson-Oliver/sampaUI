# Card

Container para agrupar conteudo com header, actions e footer opcionais.

## Uso

```blade
<x-sampaui::card title="Contrato" description="Em analise" variant="primary">
    Proposta aguardando revisao juridica.

    <x-slot:footer>
        Atualizado ha 3 minutos.
    </x-slot:footer>
</x-sampaui::card>
```

## Props

- `title`
- `description`
- `variant`: `default`, `muted`, `primary`, `secondary`, `accent`, `danger`, `success`, `warning`, `info` ou `purple`
- `padding`: `sm`, `md` ou `lg`
- `divided`: `false` por padrao. Use `:divided="true"` quando precisar separar header e conteudo.

`appearance` aceita `outline` (padrao), `soft` e `solid`, sempre com tokens semanticos do SampaUI.
