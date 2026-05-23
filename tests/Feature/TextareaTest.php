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
}
