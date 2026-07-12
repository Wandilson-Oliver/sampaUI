<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class SelectSearchTest extends TestCase
{
    public function test_it_renders_searchable_select_with_options_and_selected_value(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::select-search
    id="owner"
    name="owner"
    label="Responsavel"
    value="ana"
    :options="[
        'ana' => 'Ana Souza',
        'bruno' => 'Bruno Lima',
    ]"
/>
BLADE);

        $html->assertSee('Responsavel');
        $html->assertSee('Ana Souza');
        $html->assertSee('Bruno Lima');
        $html->assertSee('x-data=', false);
        $html->assertSee('<select', false);
        $html->assertSee('class="sr-only"', false);
        $html->assertSee('name="owner"', false);
        $html->assertSee('value="ana"', false);
        $html->assertSee('role="listbox"', false);
        $html->assertSee('role="option"', false);
        $html->assertSee('border border-secondary/20', false);
        $html->assertSee('hover:border-secondary/30', false);
        $html->assertSee('min-h-12', false);
        $html->assertSee('shadow-2xl shadow-secondary/10', false);
        $html->assertSee('bi bi-search', false);
        $html->assertSee('bi bi-chevron-down', false);
    }

    public function test_it_preserves_livewire_attributes_and_custom_class(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::select-search
    name="city"
    label="Cidade"
    placeholder="Selecione a cidade"
    search-placeholder="Buscar cidade"
    empty-text="Sem cidades"
    class="custom-trigger"
    wire:model.live="city"
    required
    :options="[
        ['value' => 'sp', 'label' => 'Sao Paulo'],
        ['value' => 'campinas', 'label' => 'Campinas'],
    ]"
/>
BLADE);

        $html->assertSee('Selecione a cidade');
        $html->assertSee('Buscar cidade');
        $html->assertSee('Sem cidades');
        $html->assertSee('custom-trigger', false);
        $html->assertSee('wire:model.live="city"', false);
        $html->assertSee('x-modelable="value"', false);
        $html->assertSee('SampaUI.selectSearch', false);
        $html->assertSee('x-teleport="body"', false);
        $html->assertSee('x-bind:style="menuStyle"', false);
        $html->assertSee('required', false);
        $html->assertSee('SampaUI.selectSearch', false);
        $html->assertSee('x-model="value"', false);
    }

    public function test_it_supports_error_and_disabled_states(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::select-search
    name="status"
    label="Status"
    error="Escolha um status."
    disabled
    :options="['active' => 'Ativo']"
/>
BLADE);

        $html->assertSee('Escolha um status.');
        $html->assertSee('aria-invalid="true"', false);
        $html->assertSee('disabled', false);
        $html->assertSee('border-danger', false);
        $html->assertSee('cursor-not-allowed opacity-50', false);
    }

    public function test_it_resolves_livewire_validation_errors_without_a_name_prop(): void
    {
        $this->withViewErrors(['owner' => 'Escolha um responsavel.']);

        $this->blade('<x-sampaui::select-search label="Responsavel" wire:model="owner" :options="[]" />')
            ->assertSee('Escolha um responsavel.')
            ->assertSee('id="owner-error"', false)
            ->assertSee('aria-invalid="true"', false);
    }
}
