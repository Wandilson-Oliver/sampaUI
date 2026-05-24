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
- `variant`: `default`, `muted`, `primary`, `secondary`, `accent` ou `danger`
- `padding`: `sm`, `md` ou `lg`
- `divided`
