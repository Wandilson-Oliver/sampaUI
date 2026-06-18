<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class MaskedInputTest extends TestCase
{
    public function test_phone_uses_input_base_and_phone_mask(): void
    {
        $html = $this->blade(
            '<x-sampaui::phone name="phone" label="Telefone" wire:model.live="phone" class="custom-phone" />'
        );

        $html->assertSee('Telefone');
        $html->assertSee('wire:model.live="phone"', false);
        $html->assertSee('custom-phone', false);
        $html->assertSee('border border-secondary/30', false);
        $html->assertSee('bi bi-telephone', false);
        $html->assertSee('inputmode="tel"', false);
        $html->assertSee('autocomplete="tel"', false);
        $html->assertSee('value.replace(/\\D/g, \'\').slice(0, 11)', false);
        $html->assertSee('value.slice(2, 3) + \' \' + value.slice(3, 7) + \'-\' + value.slice(7)', false);
        $html->assertSee('x-on:input="$el.value = format($el.value); if ($el._x_model) { $el._x_model.set($el.value); }"', false);
        $html->assertDontSee('x-mask', false);
    }

    public function test_currency_br_uses_input_base_and_brazilian_formatter(): void
    {
        $html = $this->blade(
            '<x-sampaui::currency-br name="price" label="Valor" wire:model.live="price" class="custom-currency" />'
        );

        $html->assertSee('Valor');
        $html->assertSee('wire:model.live="price"', false);
        $html->assertSee('custom-currency', false);
        $html->assertSee('border border-secondary/30', false);
        $html->assertSee('inputmode="decimal"', false);
        $html->assertSee('R$');
        $html->assertSee('x-on:input="$el.value = format($el.value); if ($el._x_model) { $el._x_model.set($el.value); }"', false);
    }

    public function test_cep_uses_input_base_and_postal_code_mask(): void
    {
        $html = $this->blade(
            '<x-sampaui::cep name="postal_code" label="CEP" wire:model.live="postalCode" class="custom-cep" />'
        );

        $html->assertSee('CEP');
        $html->assertSee('wire:model.live="postalCode"', false);
        $html->assertSee('custom-cep', false);
        $html->assertSee('border border-secondary/30', false);
        $html->assertSee('bi bi-geo-alt', false);
        $html->assertSee('inputmode="numeric"', false);
        $html->assertSee('autocomplete="postal-code"', false);
        $html->assertSee('value.replace(/\\D/g, \'\').slice(0, 8)', false);
        $html->assertSee('value.slice(0, 5) + \'-\' + value.slice(5)', false);
        $html->assertSee('x-on:input="$el.value = format($el.value); if ($el._x_model) { $el._x_model.set($el.value); }"', false);
        $html->assertDontSee('x-mask', false);
    }
}
