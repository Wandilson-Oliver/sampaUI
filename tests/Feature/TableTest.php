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
        $html->assertSee('border border-border', false);
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
        $html->assertDontSee('border border-border', false);
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

    public function test_it_supports_premium_datatable_toolbar_search_pagination_selection_and_export(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::table
    title="Leads"
    description="Pipeline comercial"
    searchable
    search="ana"
    per-page="1"
    page="1"
    selectable
    row-key="id"
    export-href="/exports/leads.csv"
    :selected-rows="[2]"
    :columns="[
        'name' => 'Nome',
        'status' => 'Status',
    ]"
    :rows="[
        ['id' => 1, 'name' => 'Ana Souza', 'status' => 'Novo'],
        ['id' => 2, 'name' => 'Bruno Lima', 'status' => 'Contato'],
    ]"
/>
BLADE);

        $html->assertSee('Leads');
        $html->assertSee('Pipeline comercial');
        $html->assertSee('placeholder="Buscar registros..."', false);
        $html->assertSee('name="search"', false);
        $html->assertSee('value="ana"', false);
        $html->assertSee('href="/exports/leads.csv"', false);
        $html->assertSee('bi bi-download', false);
        $html->assertSee('x-data=', false);
        $html->assertSee('Selecionar todos os registros visiveis');
        $html->assertSee('name="selected[]"', false);
        $html->assertSee('x-bind:value="selectedRow"', false);
        $html->assertSee('table:selection-changed', false);
        $html->assertSee('value="1"', false);
        $html->assertSee('Mostrando');
        $html->assertSee('1 / 1');
        $html->assertSee('Ana Souza');
        $html->assertDontSee('Bruno Lima');
    }

    public function test_it_supports_loading_skeleton_and_custom_empty_state(): void
    {
        $loadingHtml = $this->blade(<<<'BLADE'
<x-sampaui::table
    loading
    :columns="['name' => 'Nome']"
    :rows="[['name' => 'Ana']]"
/>
BLADE);

        $loadingHtml->assertSee('aria-busy="true"', false);
        $loadingHtml->assertSee('animate-pulse', false);
        $loadingHtml->assertDontSee('Ana');

        $emptyHtml = $this->blade(<<<'BLADE'
<x-sampaui::table
    empty-title="Sem leads"
    empty-description="Ajuste os filtros."
    empty-icon="search"
    :columns="['name' => 'Nome']"
    :rows="[]"
/>
BLADE);

        $emptyHtml->assertSee('Sem leads');
        $emptyHtml->assertSee('Ajuste os filtros.');
        $emptyHtml->assertSee('bi bi-search', false);
    }

    public function test_table_is_a_simple_listing_by_default(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::table
    :columns="['name' => 'Nome']"
    :rows="[['name' => 'Ana']]"
/>
BLADE);

        $html->assertSee('Ana')
            ->assertDontSee('type="search"', false)
            ->assertDontSee('Buscar registros...');
    }

    public function test_table_search_composes_the_table_with_search_and_advanced_slots(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::table-search
    title="Clientes"
    search-model="search"
    :columns="['name' => 'Nome']"
    :rows="[['name' => 'Ana']]"
>
    <x-slot:actions><button type="button">Novo</button></x-slot:actions>
</x-sampaui::table-search>
BLADE);

        $html->assertSee('Clientes')
            ->assertSee('Ana')
            ->assertSee('type="search"', false)
            ->assertSee('wire:model.live.debounce.300ms="search"', false)
            ->assertSee('Novo');
    }
}
