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

    public function test_tailwind_class_groups_resolve_specialized_utilities(): void
    {
        $mergedText = sampaui_merge_tailwind_classes('text-secondary text-sm', 'text-nowrap text-purple-600 text-[13px]');
        $this->assertStringContainsString('text-nowrap', $mergedText);
        $this->assertStringContainsString('text-purple-600', $mergedText);
        $this->assertStringContainsString('text-[13px]', $mergedText);
        $this->assertStringNotContainsString('text-secondary', $mergedText);
        $this->assertStringNotContainsString('text-sm', $mergedText);

        $mergedBorder = sampaui_merge_tailwind_classes('border border-border', 'border-t border-purple-500');
        $this->assertStringContainsString('border-t', $mergedBorder);
        $this->assertStringContainsString('border-purple-500', $mergedBorder);
        $this->assertStringNotContainsString('border-border', $mergedBorder);

        $mergedDisplay = sampaui_merge_tailwind_classes('flex', 'grid grid-cols-2');
        $this->assertStringContainsString('grid', $mergedDisplay);
        $this->assertStringNotContainsString('flex', $mergedDisplay);
        $this->assertStringContainsString('grid-cols-2', $mergedDisplay);
    }

    public function test_header_overrides_rounded_and_border_classes(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::header
    id="test-header"
    class="rounded-none border-purple-500"
    title="Dashboard"
/>
BLADE);

        $html->assertSee('rounded-none', false);
        $html->assertDontSee('rounded-default', false);
        $html->assertSee('border-purple-500', false);
        $html->assertDontSee('border-border', false);
    }

    public function test_stepper_overrides_flex_direction(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::stepper
    class="flex-row gap-6"
    :steps="['Passo 1', 'Passo 2']"
/>
BLADE);

        $html->assertSee('flex-row', false);
        $html->assertDontSee('flex-col', false);
        $html->assertSee('gap-6', false);
        $html->assertDontSee('gap-4', false);
    }

    public function test_avatar_overrides_position_and_display(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::avatar
    name="Maria Silva"
    class="static block"
/>
BLADE);

        preg_match('/<span[^>]*class="([^"]*)"/', (string) $html, $matches);
        $this->assertNotEmpty($matches);
        $rootClasses = $matches[1];
        $this->assertStringContainsString('static', $rootClasses);
        $this->assertStringNotContainsString('relative', $rootClasses);
        $this->assertStringContainsString('block', $rootClasses);
        $this->assertStringNotContainsString('inline-flex', $rootClasses);
    }

    public function test_toast_overrides_max_width(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::toast
    class="max-w-lg"
/>
BLADE);

        $html->assertSee('max-w-lg', false);
        $html->assertDontSee('max-w-sm', false);
    }

    public function test_indicator_overrides_text_size_and_color(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::indicator
    class="text-xs text-slate-500"
    label="Ativo"
/>
BLADE);

        $html->assertSee('text-xs', false);
        $html->assertDontSee('text-sm', false);
        $html->assertSee('text-slate-500', false);
        $html->assertDontSee('text-secondary', false);
    }

    public function test_progress_overrides_space_y(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::progress
    :value="50"
    label="Progresso"
    class="space-y-6"
/>
BLADE);

        $html->assertSee('space-y-6', false);
        $html->assertDontSee('space-y-2', false);
    }

    public function test_skeleton_overrides_space_y(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::skeleton
    :lines="3"
    class="space-y-6"
/>
BLADE);

        $html->assertSee('space-y-6', false);
        $html->assertDontSee('space-y-2', false);
    }
}
