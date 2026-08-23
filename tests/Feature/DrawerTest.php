<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class DrawerTest extends TestCase
{
    public function test_it_renders_livewire_drawer_structure(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::drawer model="showDrawer" title="Filtros" subtitle="Refine a listagem" placement="right" size="lg">
    Conteudo do drawer

    <x-slot:actions>
        <button type="button">Limpar</button>
        <button type="button">Aplicar</button>
    </x-slot:actions>
</x-sampaui::drawer>
BLADE);

        $html->assertSee('Filtros');
        $html->assertSee('Refine a listagem');
        $html->assertSee('Conteudo do drawer');
        $html->assertSee('Limpar');
        $html->assertSee('Aplicar');
        $html->assertSee('role="dialog"', false);
        $html->assertSee('aria-modal="true"', false);
        $html->assertSee('id="sampaui-drawer-standalone-showDrawer"', false);
        $html->assertSee('max-w-lg', false);
        $html->assertSee('rounded-l-default', false);
        $html->assertSee('$wire.entangle(\'showDrawer\').live', false);
        $html->assertSee('SampaUI.overlay', false);
        $html->assertSee('data-sampaui-overlay', false);
        $html->assertSee('x-bind:style="{ zIndex: layer }"', false);
        $html->assertSee('closeDelay: 520', false);
        $html->assertSee('x-teleport="body"', false);
        $html->assertSee('translate-x-full opacity-0', false);
        $html->assertSee('translate-x-0 translate-y-0 opacity-100', false);
        $html->assertSee('will-change: transform, opacity;', false);
        $html->assertSee('duration-500', false);
        $html->assertSee('ease-[cubic-bezier(0.22,1,0.36,1)]', false);
        $html->assertSee('backdrop-blur-[2px]', false);
        $html->assertSee('aria-label="Fechar drawer"', false);
        $html->assertSee('x-on:keydown.tab="trapTab($event)"', false);
        $html->assertSee('border border-border', false);
    }

    public function test_it_supports_placement_events_and_panel_class(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::drawer
    id="filters-drawer"
    model="filtersOpen"
    placement="left"
    size="sm"
    persistent
    :close-button="false"
    close-event="filters-applied"
    after-close="afterDrawerClose"
    panel-class="border border-primary/20"
    backdrop-class="bg-black/50"
    class="custom-drawer"
    wire:key="filters-drawer"
>
    Conteudo
</x-sampaui::drawer>
BLADE);

        $html->assertSee('id="filters-drawer"', false);
        $html->assertSee('custom-drawer', false);
        $html->assertSee('wire:key="filters-drawer"', false);
        $html->assertSee('max-w-sm', false);
        $html->assertSee('rounded-r-default', false);
        $html->assertSee('bg-black/50', false);
        $html->assertSee('-translate-x-full opacity-0', false);
        $html->assertSee('translate-x-0 translate-y-0 opacity-100', false);
        $html->assertSee('x-on:filters-applied.window="close()"', false);
        $html->assertSee("afterClose: 'afterDrawerClose'", false);
        $html->assertSee('closeOnEscape: false', false);
        $html->assertSee('closeOnOutside: false', false);
        $html->assertSee('border border-primary/20', false);
        $html->assertDontSee('aria-label="Fechar drawer"', false);
    }

    public function test_it_supports_extended_border_variants(): void
    {
        $this->blade('<x-sampaui::drawer model="open" variant="info">Conteudo</x-sampaui::drawer>')
            ->assertSee('border-info', false);

        $this->blade('<x-sampaui::drawer model="open" variant="purple">Conteudo</x-sampaui::drawer>')
            ->assertSee('border-purple', false);
    }
}
