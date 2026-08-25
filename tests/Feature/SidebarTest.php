<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class SidebarTest extends TestCase
{
    public function test_it_renders_logo_user_items_and_sections(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::sidebar
    logo-src="/images/client-logo.svg"
    logo-alt="Cliente"
    brand-href="/dashboard"
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

        $html->assertSee('/dashboard', false);
        $html->assertSee('<img src="/images/client-logo.svg" alt="Cliente"', false);
        $html->assertDontSee('logo-sampaui-mark.png', false);
        $html->assertSee('Ana Silva');
        $html->assertSee('ana@example.com');
        $html->assertSee('Dashboard');
        $html->assertSee('Gestao');
        $html->assertSee('Clientes');
        $html->assertSee('Sair');
        $html->assertSee('aria-current="page"', false);
        $html->assertSee('border-r border-border bg-surface', false);
        $html->assertDontSee('md:sticky', false);
        $html->assertSee('style="width: 18rem;"', false);
        $html->assertSee('collapsed: false', false);
        $html->assertSee('stateEvent: \'sampaui:sidebar-state\'', false);
        $html->assertSee('toggle() { this.setCollapsed(! this.collapsed) }', false);
        $html->assertSee('x-init="emitState()"', false);
        $html->assertSee('x-on:sampaui:sidebar-open.window="open = true; setCollapsed(false)"', false);
        $html->assertSee('x-on:sampaui:sidebar-close.window="open = false; setCollapsed(true)"', false);
        $html->assertSee("x-on:click.prevent.stop=\"window.matchMedia('(max-width: 767px)').matches ? (open = false, setCollapsed(true)) : toggle()\"", false);
        $html->assertSee("x-bind:aria-label=\"window.matchMedia('(max-width: 767px)').matches ? 'Fechar navegacao' : (collapsed ? 'Expandir navegacao' : 'Recolher navegacao')\"", false);
        $html->assertSee("x-bind:class=\"collapsed ? 'justify-center px-0 py-1' : 'px-1 py-1'\"", false);
        $html->assertSee('x-bind:style="`width: ${width()};`"', false);
        $html->assertDontSee('-right-10 hidden w-10 bg-light', false);
        $html->assertSee('bi-chevron-left', false);
        $html->assertSee('bi-chevron-right', false);
        $html->assertSee('gap-3.5 rounded-default !bg-transparent', false);
        $html->assertSee('bg-light text-purple', false);
        $html->assertSee('text-secondary/45 group-hover:bg-light group-hover:text-purple', false);
        $html->assertDontSee('bg-primary text-white', false);
        $html->assertSee('sampaui-sidebar-scroll min-h-0 flex-1 overflow-y-auto overscroll-contain', false);
        $html->assertSee('flex flex-col gap-5', false);
        $html->assertSee('flex flex-col gap-2', false);
        $html->assertSee('shrink-0 pb-12 pt-7', false);
        $html->assertSee('shrink-0 pb-14', false);
        $html->assertSee('shrink-0 pb-10 pt-4', false);
        $html->assertSee('flex cursor-pointer items-center text-secondary', false);
        $html->assertSee('group flex cursor-pointer items-center gap-3.5', false);
        $html->assertSee('h-16 min-h-16 w-16 min-w-16', false);
        $html->assertSee('border border-danger bg-transparent', false);
        $html->assertSee('text-danger shadow-none', false);
    }

    public function test_it_merges_attributes_and_preserves_wire_navigate_items(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::sidebar
    id="main-nav"
    class="custom-sidebar"
    open-event="open-sidebar"
    close-event="close-sidebar"
    state-event="sidebar-state"
    :items="[
        ['label' => 'Relatorios', 'href' => '/reports', 'icon' => 'bar-chart', 'navigate' => true],
    ]"
/>
BLADE);

        $html->assertSee('id="main-nav"', false);
        $html->assertSee('custom-sidebar', false);
        $html->assertSee('stateEvent: \'sidebar-state\'', false);
        $html->assertSee('x-on:open-sidebar.window="open = true; setCollapsed(false)"', false);
        $html->assertSee('x-on:close-sidebar.window="open = false; setCollapsed(true)"', false);
        $html->assertSee('wire:navigate', false);
        $html->assertSee('Relatorios');
    }

    public function test_it_supports_explicit_initial_open_and_closed_states(): void
    {
        $open = $this->blade(<<<'BLADE'
<x-sampaui::sidebar
    initial-state="open"
    :items="[
        ['label' => 'Dashboard', 'href' => '/dashboard', 'icon' => 'grid'],
    ]"
/>
BLADE);

        $open->assertSee('style="width: 18rem;"', false);
        $open->assertSee('collapsed: false', false);
        $open->assertSee("x-on:click.prevent.stop=\"window.matchMedia('(max-width: 767px)').matches ? (open = false, setCollapsed(true)) : toggle()\"", false);

        $closed = $this->blade(<<<'BLADE'
<x-sampaui::sidebar
    initial-state="closed"
    :items="[
        ['label' => 'Dashboard', 'href' => '/dashboard', 'icon' => 'grid'],
    ]"
/>
BLADE);

        $closed->assertSee('style="width: 6rem;"', false);
        $closed->assertSee('collapsed: true', false);
        $closed->assertSee("x-on:click.prevent.stop=\"window.matchMedia('(max-width: 767px)').matches ? (open = false, setCollapsed(true)) : toggle()\"", false);
    }

    public function test_it_accepts_logo_src_and_avatar_props(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::sidebar
    logo-src="/images/liacor.svg"
    logo-alt="Logo LIACOR"
    avatar="/images/admin.jpg"
    avatar-alt="Foto do administrador"
    :user="['name' => 'Administrador Lia', 'email' => 'admin@sampa.dev']"
    :items="[
        ['label' => 'Dashboard', 'href' => '/dashboard', 'icon' => 'grid'],
    ]"
/>
BLADE);

        $html->assertSee('<img src="/images/liacor.svg" alt="Logo LIACOR"', false);
        $html->assertSee('<img src="/images/admin.jpg" alt="Foto do administrador"', false);
        $html->assertSee('Administrador Lia');
        $html->assertDontSee('rounded-t-full rounded-bl-full', false);
    }

    public function test_it_has_no_default_brand_and_uses_only_logo_src(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::sidebar
    logo-src="/images/nova-logo.png"
    logo-alt="Logo da minha marca"
/>
BLADE);

        $html->assertSee('<img src="/images/nova-logo.png" alt="Logo da minha marca"', false);
        $html->assertDontSee('logo-sampaui-mark.png', false);
        $html->assertDontSee('SampaUI', false);
    }

    public function test_user_avatar_array_has_priority_over_avatar_prop(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::sidebar
    avatar="/images/fallback.jpg"
    :user="['name' => 'Ana Silva', 'avatar' => '/images/ana.jpg']"
    :items="[
        ['label' => 'Dashboard', 'href' => '/dashboard', 'icon' => 'grid'],
    ]"
/>
BLADE);

        $html->assertSee('<img src="/images/ana.jpg" alt="Ana Silva"', false);
        $html->assertDontSee('/images/fallback.jpg', false);
    }

    public function test_it_does_not_render_an_external_rail(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::sidebar
    :items="[
        ['label' => 'Dashboard', 'href' => '/dashboard', 'icon' => 'grid'],
    ]"
/>
BLADE);

        $html->assertDontSee('-right-10 hidden w-10 bg-light', false);
        $html->assertSee('Dashboard');
    }

    public function test_it_supports_static_position_for_embedded_layouts_and_previews(): void
    {
        $html = $this->blade('<x-sampaui::sidebar position="static" />');

        $html->assertSee('relative h-full', false);
        $html->assertDontSee('fixed inset-y-0 left-0 h-screen', false);
        $html->assertDontSee('x-bind:class="open ?', false);
    }

    public function test_it_renders_item_badges_and_variants(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::sidebar
    :items="[
        ['label' => 'Mensagens', 'href' => '/chat', 'icon' => 'chat', 'badge' => '5', 'badgeVariant' => 'danger'],
        ['label' => 'Novidades', 'href' => '/news', 'icon' => 'stars', 'badge' => 'Novo', 'badgeVariant' => 'primary'],
    ]"
/>
BLADE);

        $html->assertSee('Mensagens');
        $html->assertSee('Novidades');
        $html->assertSee('5');
        $html->assertSee('Novo');
        $html->assertSee('bg-danger', false);
    }

    public function test_it_renders_nested_subitems_and_accordion(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::sidebar
    :items="[
        [
            'label' => 'Cadastros',
            'icon' => 'folder',
            'children' => [
                ['label' => 'Clientes', 'href' => '/clients', 'active' => true],
                ['label' => 'Fornecedores', 'href' => '/suppliers'],
            ],
        ],
    ]"
/>
BLADE);

        $html->assertSee('Cadastros');
        $html->assertSee('Clientes');
        $html->assertSee('Fornecedores');
        $html->assertSee('expanded: true', false);
        $html->assertSee('rotate-180', false);
        $html->assertSee('/clients', false);
        $html->assertSee('/suppliers', false);
    }

    public function test_it_supports_brand_user_and_default_slots(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::sidebar>
    <x-slot:brand>
        <div class="custom-brand">Minha Marca Pro</div>
    </x-slot:brand>

    <x-slot:userSlot>
        <div class="custom-user-profile">Perfil VIP</div>
    </x-slot:userSlot>

    <div class="custom-extra-menu">Bloco Extra de Navegacao</div>
</x-sampaui::sidebar>
BLADE);

        $html->assertSee('Minha Marca Pro');
        $html->assertSee('Perfil VIP');
        $html->assertSee('Bloco Extra de Navegacao');
    }

    public function test_it_renders_mobile_backdrop_and_escape_listener(): void
    {
        $html = $this->blade('<x-sampaui::sidebar />');

        $html->assertSee('fixed inset-0 z-40 bg-secondary/40 backdrop-blur-xs md:hidden', false);
        $html->assertSee('x-on:keydown.escape.window', false);
    }
}

