<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class ButtonTest extends TestCase
{
    public function test_it_renders_variants_icons_loading_and_custom_attributes(): void
    {
        $html = $this->blade(
            '<x-sampaui::button variant="outline" size="lg" icon="plus" wire:click="save" class="w-full">Adicionar</x-sampaui::button>'
        );

        $html->assertSee('Adicionar');
        $html->assertSee('border-primary', false);
        $html->assertSee('bi bi-plus', false);
        $html->assertSee('wire:click="save"', false);
        $html->assertSee('w-full', false);

        $loading = $this->blade('<x-sampaui::button loading>Salvar</x-sampaui::button>');

        $loading->assertSee('bi bi-arrow-repeat animate-spin', false);
        $loading->assertSee('disabled', false);
        $loading->assertSee('aria-busy="true"', false);

        $customized = $this->blade('<x-sampaui::button class="bg-danger text-slate-900 px-8 py-5 rounded-none shadow-none w-auto">Personalizado</x-sampaui::button>');

        $customized
            ->assertSee('bg-danger', false)
            ->assertSee('text-slate-900', false)
            ->assertSee('px-8 py-5', false)
            ->assertSee('rounded-none', false)
            ->assertSee('shadow-none', false)
            ->assertSee('w-auto', false)
            ->assertDontSee('bg-primary', false)
            ->assertDontSee('hover:bg-primary/90', false)
            ->assertDontSee('text-white', false)
            ->assertDontSee('px-4 py-2.5', false)
            ->assertDontSee('rounded-default', false);

        $disabled = $this->blade('<x-sampaui::button disabled class="cursor-pointer">Desabilitado</x-sampaui::button>');

        $disabled
            ->assertSee('cursor-not-allowed', false)
            ->assertDontSee('cursor-pointer', false);
    }

    public function test_it_supports_extended_palette_and_falls_back_to_primary(): void
    {
        $this->blade('<x-sampaui::button variant="success">Publicado</x-sampaui::button>')
            ->assertSee('bg-success text-white hover:bg-success/90', false);

        $this->blade('<x-sampaui::button variant="purple">Especial</x-sampaui::button>')
            ->assertSee('bg-purple text-white hover:bg-purple/90', false);

        $this->blade('<x-sampaui::button variant="unknown">Fallback</x-sampaui::button>')
            ->assertSee('bg-primary text-white hover:bg-primary/90', false);
    }

    public function test_it_renders_links_when_href_is_provided(): void
    {
        $this->blade('<x-sampaui::button href="/clientes" wire:navigate icon="arrow-right">Clientes</x-sampaui::button>')
            ->assertSee('<a', false)
            ->assertSee('href="/clientes"', false)
            ->assertSee('wire:navigate', false)
            ->assertDontSee('<button', false)
            ->assertDontSee('type="button"', false);

        $this->blade('<x-sampaui::button href="/clientes" disabled>Clientes</x-sampaui::button>')
            ->assertSee('aria-disabled="true"', false)
            ->assertSee('tabindex="-1"', false)
            ->assertDontSee('href="/clientes"', false);
    }

    public function test_it_supports_loading_target_prop_and_wire_loading_attributes(): void
    {
        $html = $this->blade('<x-sampaui::button loading-target="save" icon="plus">Salvar</x-sampaui::button>');

        $html->assertSee('wire:loading.attr="disabled"', false);
        $html->assertSee('wire:loading.attr.aria-busy="true"', false);
        $html->assertSee('wire:loading.class="opacity-75 cursor-wait"', false);
        $html->assertSee('wire:target="save"', false);
        $html->assertSee('bi bi-arrow-repeat animate-spin', false);
        $html->assertSee('wire:loading', false);
        $html->assertSee('wire:loading.remove', false);
        $html->assertSee('bi bi-plus', false);
        $html->assertSee('Salvar');
    }
}
