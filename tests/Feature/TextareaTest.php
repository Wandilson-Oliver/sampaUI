<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class TextareaTest extends TestCase
{
    public function test_it_renders_rows_slot_and_alpine_attributes(): void
    {
        $html = $this->blade(
            '<x-sampaui::textarea id="description" name="description" label="Descricao" rows="6" x-data="{ open: true }">Texto</x-sampaui::textarea>'
        );

        $html->assertSee('Descricao');
        $html->assertSee('rows="6"', false);
        $html->assertSee('x-data="{ open: true }"', false);
        $html->assertSee('Texto');
    }

    public function test_it_passes_livewire_attributes_and_error_state(): void
    {
        $html = $this->blade(
            '<x-sampaui::textarea name="description" label="Descricao" error="Campo obrigatorio" wire:model.live="description">Texto</x-sampaui::textarea>'
        );

        $html->assertSee('wire:model.live="description"', false);
        $html->assertSee('aria-invalid="true"', false);
        $html->assertSee('Campo obrigatorio');
    }
}
