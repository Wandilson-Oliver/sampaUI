<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class InputTest extends TestCase
{
    public function test_it_renders_label_error_disabled_and_livewire_attributes(): void
    {
        $html = $this->blade(
            '<x-sampaui::input id="email" name="email" label="Email" error="Obrigatorio" disabled wire:model.live="email" class="custom-input" />'
        );

        $html->assertSee('Email');
        $html->assertSee('Obrigatorio');
        $html->assertSee('wire:model.live="email"', false);
        $html->assertSee('custom-input', false);
        $html->assertSee('aria-invalid="true"', false);
        $html->assertSee('border border-light', false);
        $html->assertSee('focus:border-primary', false);
        $html->assertSee('border-danger', false);
        $html->assertSee('ring-2 ring-danger/20', false);
        $html->assertSee('disabled', false);
    }
}
