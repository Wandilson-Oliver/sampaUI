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
        $html->assertSee('x-modelable="value"', false);
        $html->assertSee('x-ref="native"', false);
        $html->assertSee('role="listbox"', false);
        $html->assertSee('role="option"', false);
        $html->assertSee('shadow-2xl shadow-secondary/10', false);
        $html->assertSee('bi bi-chevron-down', false);
    }

    public function test_it_supports_options_prop_selected_value_and_custom_class(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::select
    name="status"
    label="Status"
    value="active"
    class="custom-trigger"
    :options="[
        'active' => 'Ativo',
        'inactive' => 'Inativo',
    ]"
/>
BLADE);

        $html->assertSee('Status');
        $html->assertSee('Ativo');
        $html->assertSee('Inativo');
        $html->assertSee('custom-trigger', false);
        $html->assertSee('value: \'active\'', false);
        $html->assertSee('select:changed', false);
    }
}
