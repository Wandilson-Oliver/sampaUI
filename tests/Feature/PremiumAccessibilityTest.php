<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class PremiumAccessibilityTest extends TestCase
{
    public function test_fields_associate_label_hint_error_and_livewire_loading(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::input
    id="email"
    name="email"
    label="Email"
    hint="Use o email profissional"
    error="Email invalido"
    required
    clearable
    loading-target="save"
    wire:model.defer="email"
/>
BLADE);

        $html->assertSee('for="email"', false);
        $html->assertSee('id="email-hint"', false);
        $html->assertSee('id="email-error"', false);
        $html->assertSee('aria-describedby="email-hint email-error"', false);
        $html->assertSee('aria-invalid="true"', false);
        $html->assertSee('wire:model.defer="email"', false);
        $html->assertSee('wire:loading.attr="disabled"', false);
        $html->assertSee('wire:target="save"', false);
        $html->assertSee('aria-label="Limpar campo"', false);
    }

    public function test_toggle_table_pagination_and_header_expose_accessible_premium_contracts(): void
    {
        $this->blade('<x-sampaui::toggle id="active" name="active" label="Ativo" hint="Publica o registro" />')
            ->assertSee('role="switch"', false)
            ->assertSee('aria-describedby="active-hint"', false);

        $this->blade('<x-sampaui::table sticky-header mobile-cards :columns="[\'name\' => \'Nome\']" :rows="[[\'name\' => \'Ana\']]" />')
            ->assertSee('sticky top-0 z-10', false)
            ->assertSee('sm:hidden', false);

        $this->blade('<x-sampaui::pagination compact wire-method="gotoPage" :last-page="3" />')
            ->assertSee('h-9 min-w-9', false)
            ->assertSee('wire:loading.attr="disabled"', false);

        $this->blade('<x-sampaui::header id="main-header" title="Clientes"><x-slot:center>Busca</x-slot:center><x-slot:right>Perfil</x-slot:right></x-sampaui::header>')
            ->assertSee('aria-labelledby="main-header-title"', false)
            ->assertSee('Busca')
            ->assertSee('Perfil');

        $this->blade('<x-sampaui::header id="custom-header" title="Clientes"><x-slot:left>Marca customizada</x-slot:left></x-sampaui::header>')
            ->assertSee('aria-label="Clientes"', false)
            ->assertDontSee('aria-labelledby="custom-header-title"', false);
    }
}
