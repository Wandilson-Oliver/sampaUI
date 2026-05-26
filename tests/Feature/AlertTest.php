<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class AlertTest extends TestCase
{
    public function test_it_renders_title_variant_and_custom_classes(): void
    {
        $html = $this->blade(
            '<x-sampaui::alert variant="error" title="Erro" class="mt-4">Mensagem</x-sampaui::alert>'
        );

        $html->assertSee('Erro');
        $html->assertSee('Mensagem');
        $html->assertSee('role="alert"', false);
        $html->assertSee('rounded-default border px-4 py-4', false);
        $html->assertSee('border-danger', false);
        $html->assertSee('mt-4', false);
    }

    public function test_it_accepts_type_alias_and_livewire_attributes(): void
    {
        $html = $this->blade(
            '<x-sampaui::alert type="success" wire:show="saved">Salvo</x-sampaui::alert>'
        );

        $html->assertSee('bg-light', false);
        $html->assertSee('border-primary', false);
        $html->assertSee('wire:show="saved"', false);
    }
}
