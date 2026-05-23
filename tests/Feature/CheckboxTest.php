<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class CheckboxTest extends TestCase
{
    public function test_it_renders_label_checked_state_and_livewire_attributes(): void
    {
        $html = $this->blade(
            '<x-sampaui::checkbox id="terms" name="terms" label="Aceito" checked wire:model="terms" />'
        );

        $html->assertSee('Aceito');
        $html->assertSee('checked', false);
        $html->assertSee('wire:model="terms"', false);
    }
}
