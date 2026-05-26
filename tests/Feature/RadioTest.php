<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class RadioTest extends TestCase
{
    public function test_it_renders_options_checked_state_and_livewire_attributes(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::radio
    name="status"
    label="Status"
    value="active"
    wire:model.live="status"
    :options="[
        'active' => 'Ativo',
        'paused' => 'Pausado',
    ]"
/>
BLADE);

        $html->assertSee('Status');
        $html->assertSee('Ativo');
        $html->assertSee('Pausado');
        $html->assertSee('checked', false);
        $html->assertSee('wire:model.live="status"', false);
        $html->assertSee('accent-primary', false);
    }

    public function test_it_supports_inline_error_disabled_custom_class_and_color(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::radio
    name="priority"
    label="Prioridade"
    color="danger"
    class="custom-radio-group"
    inline
    disabled
    error="Escolha uma prioridade."
    :options="[
        ['value' => 'high', 'label' => 'Alta'],
    ]"
/>
BLADE);

        $html->assertSee('custom-radio-group', false);
        $html->assertSee('flex gap-4', false);
        $html->assertSee('accent-danger', false);
        $html->assertSee('disabled', false);
        $html->assertSee('Escolha uma prioridade.');
        $html->assertSee('aria-invalid="true"', false);
    }
}
