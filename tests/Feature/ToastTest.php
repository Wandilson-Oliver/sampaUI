<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class ToastTest extends TestCase
{
    public function test_it_renders_alpine_toast_container(): void
    {
        $html = $this->blade('<x-sampaui::toast position="bottom-left" max="3" class="custom-toast" wire:ignore />');

        $html->assertSee('x-data=', false);
        $html->assertSee('x-on:toast.window="add($event.detail)"', false);
        $html->assertSee('bottom-4 left-4', false);
        $html->assertSee('max: 3', false);
        $html->assertSee('custom-toast', false);
        $html->assertSee('wire:ignore', false);
    }
}
