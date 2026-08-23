<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class LivewireInteractionsTest extends TestCase
{
    public function test_select_components_in_scrollable_modal_have_teleport_and_modelable_bindings(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::modal model="showModal" title="Formulário no Modal">
    <div class="space-y-6">
        <x-sampaui::select
            name="category"
            label="Categoria"
            wire:model.live="category"
            :options="['tech' => 'Tecnologia', 'design' => 'Design']"
        />

        <x-sampaui::select-search
            name="author"
            label="Autor"
            wire:model.live="author"
            :options="['1' => 'Ana', '2' => 'Carlos']"
        />

        <x-sampaui::select-multiple
            name="tags"
            label="Tags"
            wire:model.live="tags"
            :options="['php' => 'PHP', 'laravel' => 'Laravel']"
        />

        <x-sampaui::tooltip text="Dica importante">
            <x-sampaui::button loading-target="save" wire:click="save">Salvar</x-sampaui::button>
        </x-sampaui::tooltip>
    </div>
</x-sampaui::modal>
BLADE);

        $html->assertSee('Formulário no Modal');
        $html->assertSee('SampaUI.overlay', false);
        $html->assertSee('SampaUI.select', false);
        $html->assertSee('SampaUI.selectSearch', false);
        $html->assertSee('SampaUI.selectMultiple', false);
        $html->assertSee('SampaUI.tooltip', false);
        $html->assertSee('x-teleport="body"', false);
        $html->assertSee('x-modelable="value"', false);
        $html->assertSee('wire:loading.attr="disabled"', false);
        $html->assertSee('wire:target="save"', false);
    }

    public function test_avatar_and_file_upload_components_have_safe_teardown_and_destroy_hooks(): void
    {
        $avatarHtml = $this->blade('<x-sampaui::avatar-upload name="avatar" label="Foto" wire:model="avatar" />');
        $avatarHtml->assertSee('SampaUI.avatarUpload', false);
        $avatarHtml->assertSee('removeImage()', false);
        $avatarHtml->assertSee('selectFile', false);

        $fileHtml = $this->blade('<x-sampaui::file-upload name="doc" label="Documento" wire:model="doc" retry />');
        $fileHtml->assertSee('SampaUI.fileUpload', false);
        $fileHtml->assertSee('revokePreviewUrls()', false);
        $fileHtml->assertSee('cancel()', false);
        $fileHtml->assertSee('retryUpload()', false);
    }

    public function test_nested_modals_and_overlays_maintain_layering_structure(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::modal model="parentOpen" title="Modal Pai">
    Conteúdo Pai
    <x-sampaui::modal model="childOpen" title="Modal Filho">
        Conteúdo Filho
    </x-sampaui::modal>
</x-sampaui::modal>
BLADE);

        $html->assertSee('Modal Pai');
        $html->assertSee('Modal Filho');
        $html->assertSee('data-sampaui-overlay', false);
        $html->assertSee('x-bind:style="{ zIndex: layer }"', false);
        $html->assertSee('trapTab($event)', false);
        $html->assertSee('handleEscape()', false);
    }
}
