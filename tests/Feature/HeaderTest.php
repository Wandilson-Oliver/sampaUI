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
        $html->assertSee('rounded-default border border-border', false);
        $html->assertSee('lg:flex-row lg:items-center', false);
        $html->assertSee('lg:ml-auto lg:w-auto lg:shrink-0 lg:justify-end', false);
        $html->assertSee('shadow-sm shadow-secondary/5', false);
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

    public function test_it_supports_search_notifications_and_sticky_mode(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::header
    title="Dashboard"
    search
    search-model="search"
    notifications
    notification-count="12"
    notification-event="open-notifications"
    sticky
/>
BLADE);

        $html->assertSee('sticky top-0 z-40', false);
        $html->assertSee('type="search"', false);
        $html->assertSee('wire:model.live.debounce.300ms="search"', false);
        $html->assertSee('aria-label="Abrir notificacoes"', false);
        $html->assertSee('$dispatch(\'open-notifications\')', false);
        $html->assertSee('12');
    }
}
