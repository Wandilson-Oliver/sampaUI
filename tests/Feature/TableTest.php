<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class TableTest extends TestCase
{
    public function test_it_renders_columns_rows_and_alignment(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::table
    :columns="[
        'name' => 'Nome',
        'status' => 'Status',
        'amount' => ['label' => 'Valor', 'key' => 'amount', 'align' => 'right'],
    ]"
    :rows="[
        ['name' => 'Ana', 'status' => 'Ativo', 'amount' => 'R$ 120,00'],
    ]"
/>
BLADE);

        $html->assertSee('Nome');
        $html->assertSee('Status');
        $html->assertSee('Valor');
        $html->assertSee('Ana');
        $html->assertSee('R$ 120,00');
        $html->assertSee('text-right', false);
        $html->assertSee('border border-light', false);
    }

    public function test_it_supports_empty_state_custom_class_and_compact_unbordered_mode(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::table
    class="custom-table"
    empty="Sem dados."
    compact
    :bordered="false"
    :columns="['name' => 'Nome']"
    :rows="[]"
/>
BLADE);

        $html->assertSee('custom-table', false);
        $html->assertSee('Sem dados.');
        $html->assertSee('px-3 py-2', false);
        $html->assertDontSee('border border-light', false);
    }

    public function test_it_supports_sortable_columns_wire_method_and_static_sorting(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::table
    sort-by="name"
    sort-direction="asc"
    sort-method="sortBy"
    :columns="[
        'name' => ['label' => 'Nome', 'sortable' => true],
        'status' => 'Status',
    ]"
    :rows="[
        ['name' => 'Bruno', 'status' => 'Pendente'],
        ['name' => 'Ana', 'status' => 'Ativo'],
    ]"
/>
BLADE);

        $html->assertSee('wire:click="sortBy(\'name\')"', false);
        $html->assertSee('aria-sort="ascending"', false);
        $html->assertSee('bi bi-sort-up', false);
        $html->assertSee('Nome');
        $html->assertSee('Status');

        $staticHtml = $this->blade(<<<'BLADE'
<x-sampaui::table
    sort-by="name"
    sort-direction="asc"
    :columns="[
        'name' => ['label' => 'Nome', 'sortable' => true],
    ]"
    :rows="[
        ['name' => 'Bruno'],
        ['name' => 'Ana'],
    ]"
/>
BLADE);

        $staticHtml->assertSeeInOrder(['Ana', 'Bruno']);
        $staticHtml->assertSee('data-sort-by="name"', false);
        $staticHtml->assertSee('data-sort-direction="desc"', false);
    }
}
