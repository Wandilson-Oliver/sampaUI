<?php

namespace SampaUI\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use SampaUI\Support\ComponentRegistry;

class DoctorCommand extends Command
{
    protected $signature = 'sampaui:doctor';

    protected $description = 'Inspect the current application for SampaUI installation issues.';

    public function handle(): int
    {
        $this->components->info('SampaUI Doctor');

        $this->check('Component registry', ComponentRegistry::all() !== [], 'Registry loaded.');
        $this->check('Component prefix', filled(config('sampaui.component_prefix')), 'Prefix: '.config('sampaui.component_prefix', 'sampaui'));
        $this->check('Package views', view()->exists('sampaui::components.button'), 'Blade views registered.');
        $this->check('Config file', File::exists(config_path('sampaui.php')), 'Run php artisan vendor:publish --tag=sampaui-config if you need overrides.', warningOnly: true);
        $this->check('Published CSS', File::exists(public_path('vendor/sampaui/sampaui.css')), 'Run php artisan vendor:publish --tag=sampaui-assets --force.', warningOnly: true);
        $this->check('Published JS', File::exists(public_path('vendor/sampaui/sampaui.js')), 'Run php artisan vendor:publish --tag=sampaui-assets --force.', warningOnly: true);
        $this->check('CSS import', $this->fileContains(resource_path('css/app.css'), 'vendor/sampaui/sampaui/dist/sampaui.css'), 'Import dist/sampaui.css in resources/css/app.css.', warningOnly: true);
        $this->check('JS import', $this->fileContains(resource_path('js/app.js'), 'vendor/sampaui/sampaui/dist/sampaui.js'), 'Import dist/sampaui.js in resources/js/app.js.', warningOnly: true);

        return self::SUCCESS;
    }

    private function check(string $label, bool $passes, string $detail, bool $warningOnly = false): void
    {
        if ($passes) {
            $this->components->twoColumnDetail($label, '<fg=green>OK</>');

            return;
        }

        $status = $warningOnly ? '<fg=yellow>WARN</>' : '<fg=red>FAIL</>';
        $this->components->twoColumnDetail($label, $status);
        $this->line('  '.$detail);
    }

    private function fileContains(string $path, string $needle): bool
    {
        return File::exists($path) && str_contains(File::get($path), $needle);
    }
}
