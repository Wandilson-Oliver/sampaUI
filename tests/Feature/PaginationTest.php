<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class PaginationTest extends TestCase
{
    public function test_it_renders_page_links_and_total_summary(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::pagination
    :current-page="2"
    :last-page="4"
    :total="40"
    :per-page="10"
    previous-url="/clientes?page=1"
    next-url="/clientes?page=3"
/>
BLADE);

        $html->assertSee('40');
        $html->assertSee('registros');
        $html->assertSee('10 por pagina');
        $html->assertSee('href="/clientes?page=1"', false);
        $html->assertSee('href="/clientes?page=3"', false);
        $html->assertSee('aria-current="page"', false);
        $html->assertSee('!bg-primary !text-white', false);
        $html->assertSee('<span>2</span>', false);
        $htmlWithGap = $this->blade(<<<'BLADE'
<x-sampaui::pagination
    :current-page="2"
    :last-page="8"
    previous-url="/clientes?page=1"
    next-url="/clientes?page=3"
/>
BLADE);

        $htmlWithGap->assertSee('...', false);
    }

    public function test_it_supports_wire_method_and_simple_mode(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::pagination
    :current-page="1"
    :last-page="5"
    wire-method="gotoPage"
    simple
/>
BLADE);

        $html->assertSee('wire:click="gotoPage(1)"', false);
        $html->assertSee('wire:click="gotoPage(2)"', false);
        $html->assertSee('disabled', false);
        $html->assertDontSee('aria-current="page"', false);
    }
}
