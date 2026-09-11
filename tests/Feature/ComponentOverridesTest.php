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
}
