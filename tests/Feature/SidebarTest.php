<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class SidebarTest extends TestCase
{
    public function test_it_renders_brand_user_items_and_sections(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::sidebar
    brand="SampaUI"
    brand-href="/dashboard"
    brand-icon="boxes"
    :user="['name' => 'Ana Silva', 'email' => 'ana@example.com']"
    :items="[
        ['label' => 'Dashboard', 'href' => '/dashboard', 'icon' => 'grid', 'active' => true],
    ]"
    :sections="[
        ['label' => 'Gestao', 'items' => [
            ['label' => 'Clientes', 'href' => '/clients', 'icon' => 'people'],
        ]],
    ]"
    logout-href="/logout"
/>
BLADE);

        $html->assertSee('SampaUI');
        $html->assertSee('/dashboard', false);
        $html->assertSee('Ana Silva');
        $html->assertSee('ana@example.com');
        $html->assertSee('Dashboard');
        $html->assertSee('Gestao');
        $html->assertSee('Clientes');
        $html->assertSee('Sair');
        $html->assertSee('aria-current="page"', false);
        $html->assertSee('border-r border-light bg-white', false);
        $html->assertSee('style="width: 18rem;"', false);
        $html->assertSee('collapsed: false', false);
        $html->assertSee('toggle() { this.collapsed = ! this.collapsed }', false);
        $html->assertSee('x-on:sampaui:sidebar-open.window="open = true; collapsed = false"', false);
        $html->assertSee('x-on:sampaui:sidebar-close.window="open = false; collapsed = true"', false);
        $html->assertSee('x-on:click.prevent.stop="toggle()"', false);
        $html->assertSee('x-bind:style="collapsed ? \'width: 6rem;\' : \'width: 18rem;\'"', false);
        $html->assertSee('bg-light/50', false);
        $html->assertSee('bi-chevron-left', false);
        $html->assertSee('bi-chevron-right', false);
        $html->assertSee('hover:bg-white', false);
        $html->assertSee('bg-primary text-white', false);
        $html->assertSee('sampaui-sidebar-scroll min-h-0 flex-1 overflow-y-auto overscroll-contain', false);
        $html->assertSee('flex flex-col gap-4', false);
        $html->assertSee('flex flex-col gap-2', false);
        $html->assertSee('shrink-0 pb-11 pt-10', false);
        $html->assertSee('shrink-0 pb-10 pt-4', false);
        $html->assertSee('flex cursor-pointer items-center gap-4', false);
        $html->assertSee('group flex cursor-pointer items-center gap-5', false);
        $html->assertSee('group-hover:bg-light/50', false);
        $html->assertDontSee('hover:bg-light/30', false);
        $html->assertDontSee('shadow', false);
    }

    public function test_it_merges_attributes_and_preserves_wire_navigate_items(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::sidebar
    id="main-nav"
    brand="App"
    class="custom-sidebar"
    open-event="open-sidebar"
    close-event="close-sidebar"
    :items="[
        ['label' => 'Relatorios', 'href' => '/reports', 'icon' => 'bar-chart', 'navigate' => true],
    ]"
/>
BLADE);

        $html->assertSee('id="main-nav"', false);
        $html->assertSee('custom-sidebar', false);
        $html->assertSee('x-on:open-sidebar.window="open = true; collapsed = false"', false);
        $html->assertSee('x-on:close-sidebar.window="open = false; collapsed = true"', false);
        $html->assertSee('wire:navigate', false);
        $html->assertSee('Relatorios');
    }

    public function test_it_supports_explicit_initial_open_and_closed_states(): void
    {
        $open = $this->blade(<<<'BLADE'
<x-sampaui::sidebar
    brand="App"
    initial-state="open"
    :items="[
        ['label' => 'Dashboard', 'href' => '/dashboard', 'icon' => 'grid'],
    ]"
/>
BLADE);

        $open->assertSee('style="width: 18rem;"', false);
        $open->assertSee('collapsed: false', false);
        $open->assertSee('x-on:click.prevent.stop="toggle()"', false);

        $closed = $this->blade(<<<'BLADE'
<x-sampaui::sidebar
    brand="App"
    initial-state="closed"
    :items="[
        ['label' => 'Dashboard', 'href' => '/dashboard', 'icon' => 'grid'],
    ]"
/>
BLADE);

        $closed->assertSee('style="width: 6rem;"', false);
        $closed->assertSee('collapsed: true', false);
        $closed->assertSee('x-on:click.prevent.stop="toggle()"', false);
    }

    public function test_it_accepts_logo_slot_for_custom_brand_mark(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::sidebar
    brand="LIACOR"
    brand-href="/dashboard"
    :items="[
        ['label' => 'Dashboard', 'href' => '/dashboard', 'icon' => 'grid'],
    ]"
>
    <x-slot:logo>
        <img src="/logo.svg" alt="LIACOR" class="h-10 w-10 rounded-default">
    </x-slot:logo>
</x-sampaui::sidebar>
BLADE);

        $html->assertSee('<img src="/logo.svg" alt="LIACOR"', false);
        $html->assertSee('LIACOR');
        $html->assertSee('/dashboard', false);
        $html->assertDontSee('rounded-t-full rounded-bl-full', false);
    }
}
