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

    public function test_it_supports_auto_resize_counter_clearable_and_copyable(): void
    {
        $html = $this->blade(
            '<x-sampaui::textarea name="bio" label="Biografia" auto-resize counter clearable copyable maxlength="300" max-rows="8" value="Minha biografia inicial" />'
        );

        $html->assertSee('Biografia');
        $html->assertSee('autoResize: true', false);
        $html->assertSee('maxRows: 8', false);
        $html->assertSee('maxlength="300"', false);
        $html->assertSee('Minha biografia inicial');
        $html->assertSee('Limpar');
        $html->assertSee('Copiar');
        $html->assertSee('300');
    }

    public function test_it_supports_resize_modes_and_custom_classes(): void
    {
        $html = $this->blade(
            '<x-sampaui::textarea name="notes" resize="none" class="shadow-sm" />'
        );

        $html->assertSee('resize-none', false);
        $html->assertSee('shadow-sm', false);
    }
}
