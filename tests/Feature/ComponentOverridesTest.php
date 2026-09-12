<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class ComponentOverridesTest extends TestCase
{
    public function test_table_overrides_rounded_and_border_classes(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::table
    class="rounded-3xl border-slate-300 bg-slate-900"
    :columns="['col' => 'Titulo']"
    :rows="[['col' => 'Valor']]"
/>
BLADE);

        $html->assertSee('rounded-3xl', false);
        $html->assertDontSee('rounded-default', false);
        $html->assertSee('border-slate-300', false);
        $html->assertDontSee('border-border', false);
    }

    public function test_input_overrides_rounded_and_border_classes(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::input
    name="test"
    class="rounded-2xl border-purple-500"
/>
BLADE);

        $html->assertSee('rounded-2xl', false);
        $html->assertDontSee('rounded-default', false);
        $html->assertSee('border-purple-500', false);
    }

    public function test_empty_state_overrides_rounded_and_padding_classes(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::empty-state
    class="rounded-3xl p-4 border-solid"
/>
BLADE);

        $html->assertSee('rounded-3xl', false);
        $html->assertDontSee('rounded-default', false);
        $html->assertSee('border-solid', false);
        $html->assertDontSee('border-dashed', false);
    }

    public function test_alert_overrides_rounded_classes(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::alert
    variant="info"
    class="rounded-2xl"
>
    Mensagem
</x-sampaui::alert>
BLADE);

        $html->assertSee('rounded-2xl', false);
        $html->assertDontSee('rounded-default', false);
    }

    public function test_accordion_overrides_rounded_classes(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::accordion
    :items="[['title' => 'Item 1', 'content' => 'Conteudo']]"
    class="rounded-2xl"
/>
BLADE);

        $html->assertSee('rounded-2xl', false);
        $html->assertDontSee('rounded-default', false);
    }

    public function test_modal_panel_class_overrides_rounded_and_border(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::modal
    id="test-modal"
    panel-class="rounded-3xl border-purple-500"
>
    Conteudo
</x-sampaui::modal>
BLADE);

        $html->assertSee('rounded-3xl', false);
        $html->assertDontSee('rounded-default', false);
        $html->assertSee('border-purple-500', false);
    }

    public function test_select_trigger_overrides_rounded_and_border_classes(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::select
    id="test-select"
    name="teste_select"
    class="rounded-2xl border-purple-500"
    :options="['opt1' => 'Opcao 1']"
/>
BLADE);

        preg_match('/<button[^>]*id="test-select-button"[^>]*class="([^"]*)"/', (string) $html, $matches);
        $this->assertNotEmpty($matches);
        $buttonClasses = $matches[1];
        $this->assertStringContainsString('rounded-2xl', $buttonClasses);
        $this->assertStringNotContainsString('rounded-default', $buttonClasses);
        $this->assertStringContainsString('border-purple-500', $buttonClasses);
        $this->assertStringNotContainsString('border-secondary/20', $buttonClasses);
    }

    public function test_select_search_trigger_overrides_rounded_and_border_classes(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::select-search
    id="test-search"
    name="teste_search"
    class="rounded-2xl border-purple-500"
    :options="['opt1' => 'Opcao 1']"
/>
BLADE);

        preg_match('/<button[^>]*id="test-search-button"[^>]*class="([^"]*)"/', (string) $html, $matches);
        $this->assertNotEmpty($matches);
        $buttonClasses = $matches[1];
        $this->assertStringContainsString('rounded-2xl', $buttonClasses);
        $this->assertStringNotContainsString('rounded-default', $buttonClasses);
        $this->assertStringContainsString('border-purple-500', $buttonClasses);
        $this->assertStringNotContainsString('border-secondary/20', $buttonClasses);
    }

    public function test_select_multiple_trigger_overrides_rounded_and_border_classes(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::select-multiple
    id="test-multiple"
    name="teste_multiple"
    class="rounded-2xl border-purple-500"
    :options="['opt1' => 'Opcao 1']"
/>
BLADE);

        preg_match('/<div[^>]*id="test-multiple-button"[^>]*class="([^"]*)"/', (string) $html, $matches);
        $this->assertNotEmpty($matches);
        $buttonClasses = $matches[1];
        $this->assertStringContainsString('rounded-2xl', $buttonClasses);
        $this->assertStringNotContainsString('rounded-default', $buttonClasses);
        $this->assertStringContainsString('border-purple-500', $buttonClasses);
        $this->assertStringNotContainsString('border-secondary/20', $buttonClasses);
    }

    public function test_drawer_panel_class_overrides_border(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::drawer
    id="test-drawer"
    panel-class="rounded-none border-purple-500"
>
    Conteudo Drawer
</x-sampaui::drawer>
BLADE);

        preg_match('/<section[^>]*x-ref="panel"[^>]*\sclass="([^"]*)"/', (string) $html, $matches);
        $this->assertNotEmpty($matches);
        $panelClasses = $matches[1];
        $this->assertStringContainsString('rounded-none', $panelClasses);
        $this->assertStringNotContainsString('rounded-l-default', $panelClasses);
        $this->assertStringContainsString('border-purple-500', $panelClasses);
        $this->assertStringNotContainsString('border-border', $panelClasses);
    }

    public function test_breadcrumb_overrides_text_size_and_color(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::breadcrumb
    class="text-xs text-slate-500"
    :items="[['label' => 'Home', 'href' => '/']]"
/>
BLADE);

        $html->assertSee('text-xs', false);
        $html->assertDontSee('text-sm', false);
        $html->assertSee('text-slate-500', false);
        $html->assertDontSee('text-secondary', false);
    }

    public function test_checkbox_overrides_border_and_rounded(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::checkbox
    name="check_test"
    class="rounded-full border-purple-500"
/>
BLADE);

        $html->assertSee('rounded-full', false);
        $html->assertSee('border-purple-500', false);
        $html->assertDontSee('border-secondary/40', false);
    }
}
