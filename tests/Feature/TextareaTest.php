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
        $html->assertDontSee('data-sampaui-editor', false);
    }

    public function test_it_can_enable_the_markdown_editor(): void
    {
        $html = $this->blade(
            '<x-sampaui::textarea name="description" label="Descricao" editor editor-min-height="240px" wire:model.live="description">Texto</x-sampaui::textarea>'
        );

        $html->assertSee('data-sampaui-editor="easymde"', false);
        $html->assertSee('data-sampaui-editor-min-height="240px"', false);
        $html->assertSee('wire:model.live="description"', false);
    }

    public function test_it_can_enable_the_editor_using_named_modes(): void
    {
        $html = $this->blade(
            '<x-sampaui::textarea name="body" label="Conteudo" editor="markdown">Texto</x-sampaui::textarea>'
        );

        $html->assertSee('data-sampaui-editor="easymde"', false);
    }
}
