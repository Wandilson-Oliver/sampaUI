<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class TooltipTest extends TestCase
{
    public function test_it_renders_tooltip_with_teleport_and_alpine_controller(): void
    {
        $html = $this->blade(
            '<x-sampaui::tooltip text="Ajuda aqui" position="right"><button type="button">Info</button></x-sampaui::tooltip>'
        );

        $html->assertSee('Info');
        $html->assertSee('Ajuda aqui');
        $html->assertSee('SampaUI.tooltip', false);
        $html->assertSee('x-teleport="body"', false);
        $html->assertSee('role="tooltip"', false);
        $html->assertSee('placement', false);
        $html->assertSee('right', false);
    }
}
