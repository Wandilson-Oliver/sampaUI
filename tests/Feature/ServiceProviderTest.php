<?php

namespace SampaUI\Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\View;
use SampaUI\Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    public function test_it_loads_default_config(): void
    {
        $this->assertSame('sampaui', config('sampaui.component_prefix'));
        $this->assertSame('#747F64', config('sampaui.theme.primary'));
    }

    public function test_it_registers_views_and_components(): void
    {
        $this->assertTrue(View::exists('sampaui::components.button'));
        $this->assertTrue(View::exists('sampaui::components.alert'));
        $this->assertTrue(View::exists('sampaui::components.card'));
        $this->assertTrue(View::exists('sampaui::components.toast'));

        $html = $this->blade('<x-sampaui::button>Salvar</x-sampaui::button>');

        $html->assertSee('Salvar');
        $html->assertSee('bg-primary', false);
    }

    public function test_it_registers_install_command(): void
    {
        $commands = Artisan::all();

        $this->assertArrayHasKey('sampaui:install', $commands);
    }
}
