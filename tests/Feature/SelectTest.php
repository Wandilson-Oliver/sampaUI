<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class SelectTest extends TestCase
{
    public function test_it_renders_options_placeholder_and_livewire_attributes(): void
    {
        $html = $this->blade(
            '<x-sampaui::select id="status" name="status" label="Status" placeholder="Selecione" wire:model="status"><option value="active">Ativo</option></x-sampaui::select>'
        );

        $html->assertSee('Status');
        $html->assertSee('Selecione');
        $html->assertSee('Ativo');
        $html->assertSee('wire:model="status"', false);
        $html->assertSee('x-model="value"', false);
        $html->assertSee('x-modelable="value"', false);
        $html->assertSee('x-ref="native"', false);
        $html->assertSee('role="listbox"', false);
        $html->assertSee('role="option"', false);
        $html->assertSee('shadow-2xl shadow-secondary/10', false);
        $html->assertSee('bi bi-chevron-down', false);
        $html->assertSee('x-on:keydown.arrow-down.prevent="move(1)"', false);
        $html->assertSee('aria-activedescendant', false);
        $html->assertSee('border border-secondary/20', false);
        $html->assertSee('hover:border-secondary/30', false);
        $html->assertSee('min-h-12', false);
        $html->assertSee('x-teleport="body"', false);
        $html->assertSee('id="status-menu"', false);
        $html->assertSee('style="display: none;"', false);
        $html->assertDontSee('x-ref="menu"', false);
    }

    public function test_it_supports_options_prop_selected_value_and_custom_class(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::select
    name="status"
    label="Status"
    value="active"
    class="custom-trigger"
    :options="[
        'active' => 'Ativo',
        'inactive' => 'Inativo',
    ]"
/>
BLADE);

        $html->assertSee('Status');
        $html->assertSee('Ativo');
        $html->assertSee('Inativo');
        $html->assertSee('custom-trigger', false);
        $html->assertSee('selected', false);
        $html->assertSee('SampaUI.select', false);
    }

    public function test_it_matches_input_visual_states_for_readonly_loading_and_errors(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::select
    name="status"
    label="Status"
    error="Status obrigatorio"
    readonly
    loading
    :options="['active' => 'Ativo']"
/>
BLADE);

        $html->assertSee('border-danger', false);
        $html->assertSee('ring-2 ring-danger/20', false);
        $html->assertSee('focus:border-primary', false);
        $html->assertSee('focus:ring-primary/20', false);
        $html->assertSee('bg-light/40 text-secondary/80', false);
        $html->assertSee('aria-busy="true"', false);
    }

    public function test_it_resolves_livewire_errors_and_binds_the_visible_label_bidirectionally(): void
    {
        $this->withViewErrors(['form.status' => 'Selecione um status.']);

        $html = $this->blade(<<<'BLADE'
<x-sampaui::select
    label="Status"
    wire:model.live="form.status"
    required
    :options="['active' => 'Ativo']"
/>
BLADE);

        $html->assertSee('Selecione um status.');
        $html->assertSee('wire:model.live="form.status"', false);
        $html->assertSee('x-modelable="value"', false);
        $html->assertSee('id="form.status-error"', false);
        $html->assertSee('aria-invalid="true"', false);
    }
}
