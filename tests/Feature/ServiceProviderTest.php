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
        $this->assertSame('vendor/sampaui/sampaui.css', config('sampaui.assets.css'));
        $this->assertTrue(config('sampaui.assets.load_compiled_css'));
        $this->assertSame('#5574C9', config('sampaui.theme.primary'));
        $this->assertSame('#79C8BC', config('sampaui.theme.success'));
    }

    public function test_it_registers_views_and_components(): void
    {
        $this->assertTrue(View::exists('sampaui::components.button'));
        $this->assertTrue(View::exists('sampaui::components.alert'));
        $this->assertTrue(View::exists('sampaui::components.card'));
        $this->assertTrue(View::exists('sampaui::components.drawer'));
        $this->assertTrue(View::exists('sampaui::components.header'));
        $this->assertTrue(View::exists('sampaui::components.date-picker'));
        $this->assertTrue(View::exists('sampaui::components.pagination'));
        $this->assertTrue(View::exists('sampaui::components.radio'));
        $this->assertTrue(View::exists('sampaui::components.select-search'));
        $this->assertTrue(View::exists('sampaui::components.sidebar'));
        $this->assertTrue(View::exists('sampaui::components.table'));
        $this->assertTrue(View::exists('sampaui::components.modal'));
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
