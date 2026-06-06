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
        $html->assertSee('border border-secondary/40', false);
    }

    public function test_it_accepts_color_tokens_and_falls_back_to_primary(): void
    {
        $accent = $this->blade(
            '<x-sampaui::checkbox name="featured" label="Destaque" color="accent" />'
        );

        $accent->assertSee('accent-accent', false);
        $accent->assertSee('focus:ring-accent/20', false);

        $fallback = $this->blade(
            '<x-sampaui::checkbox name="featured" label="Destaque" color="unknown" />'
        );

        $fallback->assertSee('accent-primary', false);
        $fallback->assertSee('focus:ring-primary/20', false);
    }
}
