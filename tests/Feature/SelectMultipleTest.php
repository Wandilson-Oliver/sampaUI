<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class SelectMultipleTest extends TestCase
{
    public function test_it_renders_multiple_select_with_tags_search_and_hidden_inputs(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::select-multiple
    id="roles"
    name="roles"
    label="Perfis"
    placeholder="Selecione os perfis"
    search-placeholder="Buscar perfil"
    :value="['admin']"
    :options="[
        'admin' => 'Administrador',
        'manager' => 'Gerente',
        'support' => 'Suporte',
    ]"
/>
BLADE);

        $html->assertSee('Perfis');
        $html->assertSee('Administrador');
        $html->assertSee('Gerente');
        $html->assertSee('Suporte');
        $html->assertSee('Selecione os perfis');
        $html->assertSee('Buscar perfil');
        $html->assertSee('x-data=', false);
        $html->assertSee('SampaUI.selectMultiple', false);
        $html->assertSee('multiple', false);
        $html->assertSee('name="roles[]"', false);
        $html->assertSee('role="listbox"', false);
        $html->assertSee('aria-multiselectable="true"', false);
        $html->assertSee('role="option"', false);
        $html->assertSee('bi bi-x', false);
        $html->assertSee('bi bi-search', false);
        $html->assertSee('x-on:keydown.enter.prevent="chooseActive()"', false);
        $html->assertSee('shadow-2xl shadow-secondary/10', false);
        $html->assertSee('x-on:click.outside="close()"', false);
        $html->assertSee('x-on:keydown.escape.stop="close()"', false);
    }

    public function test_it_preserves_livewire_attributes_and_custom_class(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::select-multiple
    name="permissions"
    label="Permissoes"
    class="custom-trigger"
    empty-text="Sem permissoes"
    wire:model.live="permissions"
    required
    :options="[
        ['value' => 'users.create', 'label' => 'Criar usuarios'],
        ['value' => 'users.delete', 'label' => 'Excluir usuarios', 'disabled' => true],
    ]"
/>
BLADE);

        $html->assertSee('Permissoes');
        $html->assertSee('Criar usuarios');
        $html->assertSee('Excluir usuarios');
        $html->assertSee('Sem permissoes');
        $html->assertSee('custom-trigger', false);
        $html->assertSee('wire:model.live="permissions"', false);
        $html->assertSee('multiple', false);
        $html->assertSee('required', false);
        $html->assertSee('x-bind:disabled="option.disabled"', false);
    }

    public function test_it_supports_error_disabled_and_loading_states(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::select-multiple
    name="tags"
    label="Tags"
    error="Selecione ao menos uma tag."
    disabled
    loading
    loading-text="Carregando tags"
    :options="['vip' => 'VIP']"
/>
BLADE);

        $html->assertSee('Selecione ao menos uma tag.');
        $html->assertSee('Carregando tags');
        $html->assertSee('aria-invalid="true"', false);
        $html->assertSee('disabled', false);
        $html->assertSee('border-danger', false);
        $html->assertSee('cursor-not-allowed opacity-50', false);
        $html->assertSee('bi bi-arrow-repeat animate-spin', false);
        $html->assertSee('aria-busy="true"', false);
    }
}
