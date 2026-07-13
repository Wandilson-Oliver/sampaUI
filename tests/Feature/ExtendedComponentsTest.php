<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class ExtendedComponentsTest extends TestCase
{
    public function test_badge_avatar_indicator_skeleton_and_progress_render(): void
    {
        $this->blade('<x-sampaui::brand-mark />')
            ->assertSee('vendor/sampaui/images/logo-sampaui-mark.png', false)
            ->assertSee('block h-full w-full object-contain', false);

        $this->blade('<x-sampaui::badge variant="accent" icon="star">Novo</x-sampaui::badge>')
            ->assertSee('Novo')
            ->assertSee('bi bi-star', false)
            ->assertSee('text-sm leading-5', false)
            ->assertSee('bg-accent/10', false);

        $this->blade('<x-sampaui::badge variant="success" size="xs">Novo</x-sampaui::badge>')
            ->assertSee('text-[0.6875rem] leading-4', false)
            ->assertSee('px-1.5 py-0.5', false);

        $this->blade('<x-sampaui::badge variant="secondary" size="sm">Baixa</x-sampaui::badge>')
            ->assertSee('text-xs leading-4', false);

        $this->blade('<x-sampaui::badge variant="danger" size="lg">Alta</x-sampaui::badge>')
            ->assertSee('text-base leading-6', false);

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

    public function test_brand_mark_supports_logo_size_label_and_link(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::brand-mark
    logo="/images/brand.svg"
    alt="Acme"
    label="Acme"
    href="/dashboard"
    size="lg"
    class="custom-brand"
/>
BLADE);

        $html->assertSee('<a', false)
            ->assertSee('href="/dashboard"', false)
            ->assertSee('aria-label="Acme"', false)
            ->assertSee('src="/images/brand.svg"', false)
            ->assertSee('alt="Acme"', false)
            ->assertSee('h-14 max-w-44', false)
            ->assertSee('text-2xl', false)
            ->assertSee('custom-brand', false);
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
            ->assertSee('x-teleport="body"', false)
            ->assertSee('x-bind:style="menuStyle"', false)
            ->assertSee('x-on:click.window="handleMenuOutside($event)"', false)
            ->assertSee('role="menu"', false)
            ->assertDontSee('x-ref="menu"', false)
            ->assertDontSee('x-cloak', false);

        $this->blade('<x-sampaui::dropdown label="Acoes" placement="top">Menu</x-sampaui::dropdown>')
            ->assertSee('\\u0022placement\\u0022:\\u0022top\\u0022', false);

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
            ->assertSee('relative inline-flex h-7 w-12', false)
            ->assertSee('border-accent', false)
            ->assertSee('bg-accent', false)
            ->assertSee('peer-checked:bg-white', false)
            ->assertSee('peer-checked:bg-accent', false);

        $this->blade('<x-sampaui::toggle name="special" color="purple" checked />')
            ->assertSee('border-purple', false)
            ->assertSee('bg-purple', false)
            ->assertSee('peer-checked:bg-purple', false);

        $this->blade('<x-sampaui::toggle name="danger" label="Danger" color="danger" />')
            ->assertSee('border-danger', false)
            ->assertSee('bg-danger', false)
            ->assertSee('peer-checked:bg-danger', false);

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
            ->assertSee('border-dashed border-secondary/40', false)
            ->assertSee('multiple', false);

        $this->blade('<x-sampaui::file-upload name="photos[]" label="Fotos" accept="image/*" multiple preview />')
            ->assertSee('x-for="(file, index) in files"', false)
            ->assertSee('SampaUI.fileUpload', false)
            ->assertSee('removeFile(index)', false)
            ->assertSee('role="progressbar"', false)
            ->assertSee('x-on:click="removeFile(index)"', false)
            ->assertSee("x-bind:aria-label=\"'Remover ' + file.name\"", false)
            ->assertSee("x-on:beforeunload.window=\"typeof revokePreviewUrls === 'function' && revokePreviewUrls()\"", false)
            ->assertSee('accept="image/*"', false)
            ->assertSee('id="photos"', false);

        $this->blade('<x-sampaui::avatar-upload name="photo" label="Foto do perfil" src="/ana.jpg" wire:model="photo" />')
            ->assertSee('Foto do perfil')
            ->assertSee('type="file"', false)
            ->assertSee('accept="image/*"', false)
            ->assertSee('wire:model="photo"', false)
            ->assertSee('wire:model="photoRemove"', false)
            ->assertSee('name="photo_remove"', false)
            ->assertSee('bi bi-pencil-fill', false)
            ->assertSee('bi bi-trash3-fill', false)
            ->assertSee('SampaUI.avatarUpload', false)
            ->assertSee('bottom-12 -right-1.5', false)
            ->assertSee('cursor-pointer', false)
            ->assertSee('x-bind:value="removed ? \'1\' : \'0\'"', false);

        $this->blade('<x-sampaui::avatar-upload name="avatar" remove-name="delete_avatar" placeholder="Sem imagem" help="Clique no lapis" />')
            ->assertSee('Sem imagem')
            ->assertSee('Clique no lapis')
            ->assertSee('name="delete_avatar"', false)
            ->assertDontSee('No Image', false);

        $this->blade('<x-sampaui::avatar-upload name="avatar" wire:model="user.avatar" />')
            ->assertSee('wire:model="user.avatar"', false)
            ->assertSee('wire:model="user.avatar_remove"', false);

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
