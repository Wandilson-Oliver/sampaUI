<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class PinTest extends TestCase
{
    public function test_it_renders_pin_with_length_label_hint_prefix_and_clear(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::pin
    id="verification"
    name="code"
    label="Codigo"
    hint="Digite o codigo enviado."
    prefix="G-"
    length="5"
    value="123"
    clear
/>
BLADE);

        $html->assertSee('Codigo');
        $html->assertSee('Digite o codigo enviado.');
        $html->assertSee('G-');
        $html->assertSee('x-data=', false);
        $html->assertSee('x-modelable="value"', false);
        $html->assertSee('type="hidden"', false);
        $html->assertSee('name="code"', false);
        $html->assertSee('value: \'123\'', false);
        $html->assertSee('Array(5).fill', false);
        $html->assertSee('x-ref="digit0"', false);
        $html->assertSee('x-ref="digit4"', false);
        $html->assertSee('Limpar PIN');
        $html->assertSee('clearPin()', false);
        $html->assertSee('bi bi-x-lg', false);
    }

    public function test_it_supports_masks_events_smart_and_livewire(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::pin
    name="pin"
    label="PIN"
    length="6"
    numbers
    smart
    wire:model.live="pin"
    x-on:filled="window.done = $event.detail.model"
/>
BLADE);

        $html->assertSee('wire:model.live="pin"', false);
        $html->assertSee('inputmode="numeric"', false);
        $html->assertSee('pattern="[0-9]*"', false);
        $html->assertSee('this.$dispatch(\'filled\', { model: this.value })', false);
        $html->assertSee('requestSubmit()', false);
        $html->assertSee('x-on:filled="window.done = $event.detail.model"', false);
        $html->assertSee('autocomplete="one-time-code"', false);
        $html->assertSee('wire:model.live="pin"', false);
    }

    public function test_it_supports_letters_error_disabled_and_required(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::pin
    name="invite"
    label="Convite"
    length="4"
    letters
    error="Codigo invalido."
    disabled
    required
/>
BLADE);

        $html->assertSee('Codigo invalido.');
        $html->assertSee('pattern="[A-Za-z]*"', false);
        $html->assertSee('aria-invalid="true"', false);
        $html->assertSee('border-danger', false);
        $html->assertSee('cursor-not-allowed opacity-50', false);
        $html->assertSee('disabled', false);
        $html->assertSee('required', false);
    }
}
