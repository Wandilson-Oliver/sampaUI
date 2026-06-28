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
        $html->assertSee('weekDays', false);
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
    }
}
