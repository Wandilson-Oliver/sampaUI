<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class FormBorderTest extends TestCase
{
    public function test_text_input_components_use_the_soft_secondary_default_border(): void
    {
        $components = [
            '<x-sampaui::input name="name" />',
            '<x-sampaui::phone name="phone" />',
            '<x-sampaui::currency-br name="price" />',
            '<x-sampaui::cep name="postal_code" />',
            '<x-sampaui::textarea name="notes" />',
        ];

        foreach ($components as $component) {
            $this->blade($component)->assertSee('border-secondary/30', false);
        }
    }

    public function test_picker_choice_and_upload_components_keep_the_standard_default_border(): void
    {
        $components = [
            '<x-sampaui::select name="status"><option value="active">Ativo</option></x-sampaui::select>',
            '<x-sampaui::select-search name="owner" :options="[\'ana\' => \'Ana\']" />',
            '<x-sampaui::checkbox name="active" label="Ativo" />',
            '<x-sampaui::radio name="status" :options="[\'active\' => \'Ativo\']" />',
            '<x-sampaui::date-picker name="scheduled_at" />',
            '<x-sampaui::file-upload name="contract" />',
        ];

        foreach ($components as $component) {
            $this->blade($component)->assertSee('border-secondary/40', false);
        }
    }

    public function test_select_search_internal_search_uses_the_standard_default_border(): void
    {
        $this->blade('<x-sampaui::select-search name="owner" :options="[\'ana\' => \'Ana\']" />')
            ->assertSee('rounded-default border border-secondary/40 bg-white py-2', false);
    }
}
