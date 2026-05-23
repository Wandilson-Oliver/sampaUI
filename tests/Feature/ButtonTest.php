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
}
