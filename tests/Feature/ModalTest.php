<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class ModalTest extends TestCase
{
    public function test_it_renders_livewire_modal_structure(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::modal model="showModal" title="Novo atendimento" subtitle="Revise os dados" size="2xl" variant="accent">
    Conteudo do modal

    <x-slot:actions>
        <button type="button">Cancelar</button>
        <button type="button">Salvar</button>
    </x-slot:actions>
</x-sampaui::modal>
BLADE);

        $html->assertSee('Novo atendimento');
        $html->assertSee('Revise os dados');
        $html->assertSee('Conteudo do modal');
        $html->assertSee('Cancelar');
        $html->assertSee('Salvar');
        $html->assertSee('role="dialog"', false);
        $html->assertSee('aria-modal="true"', false);
        $html->assertSee('x-teleport="body"', false);
        $html->assertSeeInOrder(['x-teleport="body"', 'x-data="{', 'x-show="visible"'], false);
        $html->assertSee('h-screen min-h-dvh', false);
        $html->assertSee('max-h-[calc(100dvh-2rem)]', false);
        $html->assertSee('max-w-2xl', false);
        $html->assertSee('rounded-default border', false);
        $html->assertSee('border-accent', false);
        $html->assertSee('$wire.entangle(\'showModal\').live', false);
        $html->assertSee('closeDelay: 260', false);
        $html->assertSee('duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]', false);
        $html->assertSee('translate-x-6 -translate-y-6 scale-75 opacity-0', false);
        $html->assertSee('origin-top-right', false);
        $html->assertSee('transition-opacity duration-300 ease-out', false);
        $html->assertSee('bg-primary/40', false);
        $html->assertSee('transition-[backdrop-filter,opacity]', false);
        $html->assertSee('backdrop-blur-[2px]', false);
        $html->assertSee('backdrop-blur-none', false);
        $html->assertSee('bi bi-x-lg', false);
    }

    public function test_it_supports_persistent_custom_events_and_attributes(): void
    {
        $html = $this->blade(<<<'BLADE'
<x-sampaui::modal
    id="lead-modal"
    model="open"
    persistent
    :close-button="false"
    close-event="lead-saved"
    after-close="afterModalClose"
    panel-class="border border-primary/20"
    class="custom-modal"
    wire:key="lead-modal"
>
    Conteudo
</x-sampaui::modal>
BLADE);

        $html->assertSee('id="lead-modal"', false);
        $html->assertSee('custom-modal', false);
        $html->assertSee('border border-primary/20', false);
        $html->assertSee('wire:key="lead-modal"', false);
        $html->assertSee('x-on:lead-saved.window="close(false)"', false);
        $html->assertSee('() =&gt; $wire.afterModalClose()', false);
        $html->assertDontSee('aria-label="Fechar modal"', false);
    }
}
