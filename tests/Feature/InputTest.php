<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class InputTest extends TestCase
{
    public function test_it_renders_label_error_disabled_and_livewire_attributes(): void
    {
        $html = $this->blade(
            '<x-sampaui::input id="email" name="email" label="Email" error="Obrigatorio" disabled wire:model.live="email" class="custom-input" />'
        );

        $html->assertSee('Email');
        $html->assertSee('Obrigatorio');
        $html->assertSee('wire:model.live="email"', false);
        $html->assertSee('custom-input', false);
        $html->assertSee('aria-invalid="true"', false);
        $html->assertSee('border border-secondary/20', false);
        $html->assertSee('focus:border-primary', false);
        $html->assertSee('border-danger', false);
        $html->assertSee('ring-2 ring-danger/20', false);
        $html->assertSee('disabled', false);
    }

    public function test_it_renders_icon_and_prefix_suffix_slots(): void
    {
        $this->blade('<x-sampaui::input name="email" label="Email" icon="envelope" />')
            ->assertSee('bi bi-envelope', false)
            ->assertSee('pl-11', false);

        $this->blade('<x-sampaui::input name="password" type="password" label="Senha" icon="lock" />')
            ->assertSee('x-data="SampaUI.input({ clearable: false })"', false)
            ->assertSee('x-bind:type="showPassword ? \'text\' : \'password\'"', false)
            ->assertSee('x-on:click="showPassword = ! showPassword"', false)
            ->assertSee('bi-eye-slash', false)
            ->assertSee('Mostrar senha', false)
            ->assertSee('pr-11', false);

        $this->blade('<x-sampaui::input name="password" type="password" label="Senha" :revealable="false" />')
            ->assertDontSee('x-bind:type="showPassword ? \'text\' : \'password\'"', false)
            ->assertDontSee('x-on:click="showPassword = ! showPassword"', false);

        $this->blade(<<<'BLADE'
<x-sampaui::input name="password" type="password" label="Senha">
    <x-slot:prefix>
        <i class="bi bi-lock"></i>
    </x-slot:prefix>
    <x-slot:suffix>
        <button type="button" aria-label="Mostrar senha">
            <i class="bi bi-eye"></i>
        </button>
    </x-slot:suffix>
</x-sampaui::input>
BLADE)
            ->assertSee('bi bi-lock', false)
            ->assertSee('bi bi-eye', false)
            ->assertSee('aria-label="Mostrar senha"', false)
            ->assertSee('pl-11', false)
            ->assertSee('pr-11', false);
    }

    public function test_it_uses_the_soft_secondary_border_by_default(): void
    {
        $this->blade('<x-sampaui::input name="name" />')
            ->assertSee('border border-secondary/20', false)
            ->assertSee('h-12 py-0', false)
            ->assertDontSee('border border-secondary/30', false);
    }
}
