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
        $html->assertSee('x-on:sampaui:toast.window="add($event.detail)"', false);
        $html->assertSee('bottom-4 left-4', false);
        $html->assertSee('SampaUI.toast({ max: 3', false);
        $html->assertSee('custom-toast', false);
        $html->assertSee('wire:ignore', false);
        $html->assertSee('rounded-default', false);
        $html->assertSee("x-on:focusin=\"pauseTimer(toast, 'focus')\"", false);
        $html->assertSee("toast.type === 'error' ? 'assertive' : 'polite'", false);
        $html->assertSee('aria-atomic="true"', false);
    }

    public function test_controller_limits_visible_toasts_and_queues_the_rest(): void
    {
        $javascript = file_get_contents(dirname(__DIR__, 2).'/resources/js/sampaui.js');

        $this->assertStringContainsString('if (this.toasts.length >= this.max) this.queue.push(toast)', $javascript);
        $this->assertStringContainsString('const next = this.queue.shift()', $javascript);
        $this->assertStringContainsString('pausedBy', $javascript);
        $this->assertStringContainsString('remaining: safeDuration', $javascript);
        $this->assertStringContainsString("['success', 'error', 'warning', 'info']", $javascript);
    }
}
