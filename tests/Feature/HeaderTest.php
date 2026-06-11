<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class HeaderTest extends TestCase
{
    public function test_it_renders_title_subtitle_status_and_actions(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::header
    title="Clientes"
    subtitle="Gerencie relacionamentos comerciais"
    eyebrow="CRM"
    status="Atualizado agora"
>
    <x-slot:actions>
        <button type="button">Novo cliente</button>
    </x-slot:actions>
</x-sampaui::header>
BLADE);

        $html->assertSee('CRM');
        $html->assertSee('Clientes');
        $html->assertSee('Gerencie relacionamentos comerciais');
        $html->assertSee('Atualizado agora');
        $html->assertSee('Novo cliente');
        $html->assertSee('rounded-default border border-light', false);
        $html->assertSee('sm:flex-row sm:items-center sm:justify-between', false);
        $html->assertSee('sm:ml-auto sm:w-auto sm:shrink-0 sm:justify-end', false);
        $html->assertDontSee('shadow', false);
    }

    public function test_it_merges_attributes_and_supports_mobile_menu_event(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::header
    title="Dashboard"
    menu
    menu-event="open-navigation"
    class="custom-header"
    wire:key="page-header"
/>
BLADE);

        $html->assertSee('custom-header', false);
        $html->assertSee('wire:key="page-header"', false);
        $html->assertSee('$dispatch(\'open-navigation\')', false);
        $html->assertSee('aria-label="Abrir navegacao"', false);
    }
}
