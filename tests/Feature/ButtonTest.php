<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class ButtonTest extends TestCase
{
    public function test_it_renders_variants_icons_loading_and_custom_attributes(): void
    {
        $html = $this->blade(
            '<x-sampaui::button variant="outline" size="lg" icon="plus" wire:click="save" class="w-full">Adicionar</x-sampaui::button>'
        );

        $html->assertSee('Adicionar');
        $html->assertSee('border-primary', false);
        $html->assertSee('bi bi-plus', false);
        $html->assertSee('wire:click="save"', false);
        $html->assertSee('w-full', false);

        $loading = $this->blade('<x-sampaui::button loading>Salvar</x-sampaui::button>');

        $loading->assertSee('bi bi-arrow-repeat animate-spin', false);
        $loading->assertSee('disabled', false);
        $loading->assertSee('aria-busy="true"', false);
    }

    public function test_it_supports_extended_palette_and_falls_back_to_primary(): void
    {
        $this->blade('<x-sampaui::button variant="success">Publicado</x-sampaui::button>')
            ->assertSee('bg-success text-white hover:bg-success/90', false);

        $this->blade('<x-sampaui::button variant="purple">Especial</x-sampaui::button>')
            ->assertSee('bg-purple text-white hover:bg-purple/90', false);

        $this->blade('<x-sampaui::button variant="unknown">Fallback</x-sampaui::button>')
            ->assertSee('bg-primary text-white hover:bg-primary/90', false);
    }
}
