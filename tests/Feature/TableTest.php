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
        $html->assertSee('h-5 w-5 cursor-pointer', false);
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
            ->assertSee('rounded-none border-0 shadow-none', false)
            ->assertSee('margin-inline: calc(var(--sampaui-card-padding-x, 0px) * -1)', false)
            ->assertSee('width: calc(100% + (var(--sampaui-card-padding-x, 0px) * 2))', false)
            ->assertDontSee('border border-border', false)
            ->assertSee('Novo');
    }

    public function test_table_search_can_disable_card_bleed(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::table-search
    :bleed="false"
    :columns="['name' => 'Nome']"
    :rows="[['name' => 'Ana']]"
/>
BLADE);

        $html->assertDontSee('--sampaui-card-padding-x', false);
    }

    public function test_table_search_bleeds_to_the_card_edges_for_every_card_padding(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::card title="Clientes" padding="lg">
    <x-sampaui::table-search
        :columns="['name' => 'Nome']"
        :rows="[['name' => 'Ana']]"
    />
</x-sampaui::card>
BLADE);

        $html->assertSee('--sampaui-card-padding-x: 1.5rem', false)
            ->assertSee('margin-inline: calc(var(--sampaui-card-padding-x, 0px) * -1)', false)
            ->assertSee('width: calc(100% + (var(--sampaui-card-padding-x, 0px) * 2))', false);
    }

    public function test_table_search_accepts_custom_filter_fields_by_slot(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::table-search
    search-model="search"
    search-placeholder="Busca padrao"
    :columns="['name' => 'Nome']"
    :rows="[['name' => 'Ana']]"
>
    <x-slot:filters>
        <x-sampaui::select
            name="status"
            value="active"
            :options="['all' => 'Todos', 'active' => 'Ativos']"
        />
        <x-sampaui::input
            type="search"
            name="custom-search"
            placeholder="Buscar cliente"
            wire:model.live.debounce.500ms="filters.search"
        />
    </x-slot:filters>
</x-sampaui::table-search>
BLADE);

        $html->assertSee('Buscar cliente')
            ->assertSee('wire:model.live.debounce.500ms="filters.search"', false)
            ->assertSee('name="status"', false)
            ->assertSee('name="custom-search"', false)
            ->assertDontSee('Busca padrao')
            ->assertDontSee('wire:model.live.debounce.300ms="search"', false);
    }

    public function test_table_search_supports_multiple_pagination_types(): void
    {
        $numbers = $this->blade(<<<'BLADE'
<x-sampaui::table-search
    pagination-type="numbers"
    per-page="1"
    page="2"
    :total="5"
    pagination-method="gotoPage"
    :columns="['name' => 'Nome']"
    :rows="[['name' => 'Ana']]"
/>
BLADE);

        $numbers->assertSee('data-pagination-type="numbers"', false)
            ->assertSee('aria-current="page"', false)
            ->assertSee('wire:click="gotoPage(2)"', false);

        $compact = $this->blade(<<<'BLADE'
<x-sampaui::table-search
    pagination-type="compact"
    per-page="1"
    page="2"
    :total="5"
    :columns="['name' => 'Nome']"
    :rows="[['name' => 'Ana']]"
/>
BLADE);

        $compact->assertSee('data-pagination-type="compact"', false)
            ->assertSee('2 / 5')
            ->assertDontSee('<span>Anterior</span>', false)
            ->assertDontSee('<span>Proxima</span>', false);
    }

    public function test_it_supports_selection_actions_and_empty_action_slot(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::table
    selectable
    :selected-rows="[1]"
    :columns="['name' => 'Nome']"
    :rows="[['id' => 1, 'name' => 'Ana']]"
>
    <x-slot:selectionActions>
        <button type="button">Excluir selecionados</button>
    </x-slot:selectionActions>
</x-sampaui::table>
BLADE);

        $html->assertSee('Excluir selecionados');
        $html->assertSee('Desmarcar todos');
        $html->assertSee('registro(s) selecionado(s)');
    }
}
