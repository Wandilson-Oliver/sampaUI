<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class DatePickerTest extends TestCase
{
    public function test_it_renders_calendar_date_picker_with_label_and_limits(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::date-picker
    name="published_at"
    label="Data de publicacao"
    value="2026-05-25"
    min="2026-01-01"
    max="2026-12-31"
    required
/>
BLADE);

        $html->assertSee('Data de publicacao');
        $html->assertSee('type="date"', false);
        $html->assertSee('class="sr-only"', false);
        $html->assertSee('value="2026-05-25"', false);
        $html->assertSee('data-min="2026-01-01"', false);
        $html->assertSee('data-max="2026-12-31"', false);
        $html->assertSee('required', false);
        $html->assertSee('bi bi-calendar3', false);
        $html->assertSee('role="dialog"', false);
        $html->assertSee('menuStyle: {}', false);
        $html->assertSee("position: 'fixed'", false);
        $html->assertDontSee('SampaUI.datePicker', false);
        $html->assertSee('x-teleport="body"', false);
        $html->assertSee('id="published_at-menu"', false);
        $html->assertSee('x-bind:style="menuStyle"', false);
        $html->assertSee('style="display: none;"', false);
        $html->assertSee('x-on:click.window="handleMenuOutside($event)"', false);
        $html->assertDontSee('x-cloak', false);
        $html->assertSee('weekDays', false);
        $html->assertSee('text-slate-600', false);
        $html->assertSee('text-current', false);
        $html->assertSee('ring-slate-300', false);
        $html->assertDontSee('AM', false);
    }

    public function test_it_preserves_livewire_attributes_custom_class_error_and_disabled(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::date-picker
    name="due_at"
    label="Vencimento"
    class="custom-date"
    error="Informe a data."
    disabled
    wire:model.live="dueAt"
/>
BLADE);

        $html->assertSee('custom-date', false);
        $html->assertSee('wire:model.live="dueAt"', false);
        $html->assertSee('x-modelable="value"', false);
        $html->assertSee('x-model="value"', false);
        $html->assertSee('Informe a data.');
        $html->assertSee('aria-invalid="true"', false);
        $html->assertSee('disabled', false);
        $html->assertSee('border-danger', false);

        $customized = $this->blade('<x-sampaui::date-picker name="reviewed_at" class="text-emerald-600 bg-slate-50" />');

        $customized
            ->assertSee('focus:ring-primary/20 text-emerald-600 bg-slate-50', false)
            ->assertDontSee('bg-white px-4 py-2.5 text-left text-base text-slate-600', false);
    }
}
