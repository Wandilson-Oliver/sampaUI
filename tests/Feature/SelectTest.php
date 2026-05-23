<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class SelectTest extends TestCase
{
    public function test_it_renders_options_placeholder_and_livewire_attributes(): void
    {
        $html = $this->blade(
            '<x-sampaui::select id="status" name="status" label="Status" placeholder="Selecione" wire:model="status"><option value="active">Ativo</option></x-sampaui::select>'
        );

        $html->assertSee('Status');
        $html->assertSee('Selecione');
        $html->assertSee('Ativo');
        $html->assertSee('wire:model="status"', false);
        $html->assertSee('appearance-none', false);
        $html->assertSee('pr-11', false);
        $html->assertSee('bi bi-chevron-down', false);
    }
}
