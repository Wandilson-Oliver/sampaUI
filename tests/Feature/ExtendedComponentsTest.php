<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class ExtendedComponentsTest extends TestCase
{
    public function test_badge_avatar_indicator_skeleton_and_progress_render(): void
    {
        $this->blade('<x-sampaui::brand-mark />')
            ->assertSee('rounded-br-md bg-primary', false)
            ->assertSee('rounded-br-[1.4rem] rounded-tl-[1.4rem] bg-secondary', false)
            ->assertSee('bg-accent', false);

        $this->blade('<x-sampaui::badge variant="accent" icon="star">Novo</x-sampaui::badge>')
            ->assertSee('Novo')
            ->assertSee('bi bi-star', false)
            ->assertSee('bg-accent/10', false);

        $this->blade('<x-sampaui::avatar src="/ana.jpg" name="Ana Silva" status="online" />')
            ->assertSee('src="/ana.jpg"', false)
            ->assertSee('alt="Ana Silva"', false)
            ->assertSee('bg-success', false);

        $this->blade('<x-sampaui::avatar name="Ana Silva" size="2xl" status="busy" />')
            ->assertSee('h-20 w-20', false)
            ->assertSee('bg-danger', false);

        $this->blade('<x-sampaui::indicator variant="danger" pulse label="Atrasado" />')
            ->assertSee('Atrasado')
            ->assertSee('animate-ping', false);

        $this->blade('<x-sampaui::skeleton :lines="3" />')
            ->assertSee('animate-pulse', false)
            ->assertSee('w-2/3', false);

        $this->blade('<x-sampaui::progress :value="45" label="Upload" show-value />')
            ->assertSee('Upload')
            ->assertSee('45%', false)
            ->assertSee('role="progressbar"', false);

        $this->blade('<x-sampaui::progress :value="20" variant="danger" />')
            ->assertSee('bg-danger', false);

        $this->blade('<x-sampaui::badge variant="purple">Especial</x-sampaui::badge>')
            ->assertSee('bg-purple/10', false)
            ->assertSee('text-purple', false);

        $this->blade('<x-sampaui::progress :value="60" variant="info" />')
            ->assertSee('bg-info', false);

        $this->blade('<x-sampaui::progress :value="60" variant="invalid" />')
            ->assertSee('bg-primary', false);
    }

    public function test_dropdown_tabs_toggle_tooltip_and_breadcrumb_render(): void
    {
        $this->blade(<<<'BLADE'
<x-sampaui::dropdown label="Acoes">
    <x-sampaui::dropdown-item href="/edit" icon="pencil">Editar</x-sampaui::dropdown-item>
    <x-sampaui::dropdown-item type="button" icon="trash" wire:click="remove">Remover</x-sampaui::dropdown-item>
</x-sampaui::dropdown>
BLADE)
            ->assertSee('Acoes')
            ->assertSee('Editar')
            ->assertSee('Remover')
            ->assertSee('wire:click="remove"', false)
            ->assertSee('sampaui-dropdown relative inline-flex w-max', false)
            ->assertSee("x-bind:class=\"open ? 'z-[90]' : 'z-10'\"", false)
            ->assertSee('z-[100]', false)
            ->assertSee('role="menu"', false);

        $this->blade(<<<'BLADE'
<x-sampaui::tabs :tabs="['overview' => 'Resumo', 'billing' => 'Cobranca']" active="overview">
    <x-sampaui::tab-panel name="overview">Conteudo</x-sampaui::tab-panel>
</x-sampaui::tabs>
BLADE)
            ->assertSee('Resumo')
            ->assertSee('Conteudo')
            ->assertSee('role="tablist"', false);

        $this->blade('<x-sampaui::toggle name="active" label="Ativo" color="accent" checked wire:model.live="active" />')
            ->assertSee('Ativo')
            ->assertSee('wire:model.live="active"', false)
            ->assertSee('items-center rounded-full', false)
            ->assertSee('border border-secondary/50', false)
            ->assertSee('peer-checked:bg-accent', false);

        $this->blade('<x-sampaui::toggle name="special" color="purple" checked />')
            ->assertSee('peer-checked:bg-purple', false);

        $this->blade('<x-sampaui::tooltip text="Copiar"><button>Icone</button></x-sampaui::tooltip>')
            ->assertSee('Copiar')
            ->assertSee('role="tooltip"', false);

        $this->blade('<x-sampaui::tooltip text="Ajuda" position="right"><button>Icone</button></x-sampaui::tooltip>')
            ->assertSee('left-full top-1/2 ml-2 -translate-y-1/2', false);

        $this->blade('<x-sampaui::breadcrumb :items="[[\'label\' => \'Home\', \'href\' => \'/\'], [\'label\' => \'Clientes\']]" />')
            ->assertSee('Home')
            ->assertSee('Clientes')
            ->assertSee('aria-label="Breadcrumb"', false);
    }

    public function test_operational_components_render(): void
    {
        $this->blade('<x-sampaui::empty-state title="Sem dados" description="Ajuste os filtros." icon="inbox" />')
            ->assertSee('Sem dados')
            ->assertSee('Ajuste os filtros.');

        $this->blade('<x-sampaui::file-upload name="contract" label="Contrato" accept=".pdf" multiple />')
            ->assertSee('Contrato')
            ->assertSee('type="file"', false)
            ->assertSee('border-dashed border-secondary/50', false)
            ->assertSee('multiple', false);

        $this->blade('<x-sampaui::file-upload name="photos[]" label="Fotos" accept="image/*" multiple preview />')
            ->assertSee('x-for="file in files"', false)
            ->assertSee('URL.createObjectURL', false)
            ->assertSee('accept="image/*"', false)
            ->assertSee('id="photos"', false);

        $this->blade('<x-sampaui::stepper :current="2" :steps="[\'Dados\', \'Pagamento\', \'Resumo\']" />')
            ->assertSee('Dados')
            ->assertSee('Pagamento')
            ->assertSee('Resumo');

        $this->blade('<x-sampaui::accordion :items="[[\'title\' => \'Detalhes\', \'content\' => \'Conteudo aberto\', \'open\' => true]]" />')
            ->assertSee('Detalhes')
            ->assertSee('Conteudo aberto')
            ->assertSee('x-transition.opacity.duration.150ms', false);

        $this->blade('<x-sampaui::command-palette :items="[[\'label\' => \'Novo lead\', \'href\' => \'/leads\', \'icon\' => \'plus\']]" />')
            ->assertSee('Novo lead')
            ->assertSee('sampaui:command-open', false)
            ->assertSee('x-ref="search"', false);
    }
}
