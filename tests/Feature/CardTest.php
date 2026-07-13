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
        $html->assertSee('rounded-default border', false);
        $html->assertSee('border-accent', false);
        $html->assertSee('pt-[15px]', false);
        $html->assertSee('style="--sampaui-card-padding-x: 1.25rem;"', false);
    }

    public function test_it_merges_classes_and_attributes(): void
    {
        $html = $this->blade(
            '<x-sampaui::card class="custom-card" x-data="{ open: true }">Conteudo</x-sampaui::card>'
        );

        $html->assertSee('custom-card', false);
        $html->assertSee('x-data="{ open: true }"', false);
    }

    public function test_it_supports_extended_surface_variants_and_default_fallback(): void
    {
        $this->blade('<x-sampaui::card variant="success">Conteudo</x-sampaui::card>')
            ->assertSee('border-success bg-white text-secondary', false);

        $this->blade('<x-sampaui::card variant="purple">Conteudo</x-sampaui::card>')
            ->assertSee('border-purple bg-white text-secondary', false);

        $this->blade('<x-sampaui::card variant="unknown">Conteudo</x-sampaui::card>')
            ->assertSee('border-border bg-white text-secondary', false);
    }

    public function test_it_exposes_the_horizontal_padding_for_flush_children(): void
    {
        $this->blade('<x-sampaui::card padding="sm">Conteudo</x-sampaui::card>')
            ->assertSee('--sampaui-card-padding-x: 1rem', false);

        $this->blade('<x-sampaui::card padding="lg">Conteudo</x-sampaui::card>')
            ->assertSee('--sampaui-card-padding-x: 1.5rem', false);
    }

    public function test_it_keeps_dropdowns_outside_the_card_bounds_by_default(): void
    {
        $this->blade('<x-sampaui::card>Conteudo</x-sampaui::card>')
            ->assertSee('overflow-visible', false)
            ->assertDontSee('overflow-hidden', false);

        $this->blade('<x-sampaui::card overflow="hidden">Conteudo</x-sampaui::card>')
            ->assertSee('overflow-hidden', false)
            ->assertDontSee('overflow-visible', false);
    }
}
