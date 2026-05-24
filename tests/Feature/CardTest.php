<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class CardTest extends TestCase
{
    public function test_it_renders_header_body_actions_and_footer(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::card title="Contrato" description="Em analise" variant="accent">
    <x-slot:actions><button type="button">Abrir</button></x-slot:actions>
    Conteudo
    <x-slot:footer>Rodape</x-slot:footer>
</x-sampaui::card>
BLADE);

        $html->assertSee('Contrato');
        $html->assertSee('Em analise');
        $html->assertSee('Abrir');
        $html->assertSee('Conteudo');
        $html->assertSee('Rodape');
        $html->assertSee('border-accent', false);
    }

    public function test_it_merges_classes_and_attributes(): void
    {
        $html = $this->blade(
            '<x-sampaui::card class="custom-card" x-data="{ open: true }">Conteudo</x-sampaui::card>'
        );

        $html->assertSee('custom-card', false);
        $html->assertSee('x-data="{ open: true }"', false);
    }
}
