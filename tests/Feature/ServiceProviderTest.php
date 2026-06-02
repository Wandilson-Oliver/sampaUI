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
        $this->assertSame('vendor/sampaui/sampaui.js', config('sampaui.assets.js'));
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

    public function test_install_command_registers_frontend_imports(): void
    {
        $cssPath = resource_path('css/app.css');
        $jsPath = resource_path('js/app.js');
        $originalCss = file_exists($cssPath) ? file_get_contents($cssPath) : null;
        $originalJs = file_exists($jsPath) ? file_get_contents($jsPath) : null;

        try {
            if (! is_dir(dirname($cssPath))) {
                mkdir(dirname($cssPath), 0777, true);
            }

            if (! is_dir(dirname($jsPath))) {
                mkdir(dirname($jsPath), 0777, true);
            }

            file_put_contents($cssPath, '@import "tailwindcss";'.PHP_EOL.PHP_EOL.'@theme {'.PHP_EOL.'}'.PHP_EOL);
            file_put_contents($jsPath, 'import "./bootstrap";'.PHP_EOL);

            Artisan::call('sampaui:install', [
                '--no-interaction' => true,
                '--force' => true,
            ]);

            $this->assertStringContainsString(
                '@import url("https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans',
                file_get_contents($cssPath)
            );
            $this->assertStringContainsString(
                '@import "../../vendor/sampaui/sampaui/dist/sampaui.css";',
                file_get_contents($cssPath)
            );
            $this->assertStringContainsString(
                'import "../../vendor/sampaui/sampaui/dist/sampaui.js";',
                file_get_contents($jsPath)
            );

            Artisan::call('sampaui:install', [
                '--no-interaction' => true,
                '--force' => true,
            ]);

            $this->assertSame(1, substr_count(file_get_contents($cssPath), 'vendor/sampaui/sampaui/dist/sampaui.css'));
            $this->assertSame(1, substr_count(file_get_contents($cssPath), 'fonts.googleapis.com/css2?family=Plus+Jakarta+Sans'));
            $this->assertSame(1, substr_count(file_get_contents($jsPath), 'vendor/sampaui/sampaui/dist/sampaui.js'));
        } finally {
            $originalCss === null ? @unlink($cssPath) : file_put_contents($cssPath, $originalCss);
            $originalJs === null ? @unlink($jsPath) : file_put_contents($jsPath, $originalJs);
        }
    }
}
