<?php

namespace SampaUI\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    protected $signature = 'sampaui:install
        {--force : Overwrite previously published files}
        {--skip-frontend : Do not import SampaUI assets into resources/css/app.css and resources/js/app.js}';

    protected $description = 'Publish SampaUI configuration, views, compiled assets and register frontend imports.';

    public function handle(): int
    {
        $force = (bool) $this->option('force');

        $this->call('vendor:publish', [
            '--tag' => 'sampaui-config',
            '--force' => $force,
        ]);

        $this->call('vendor:publish', [
            '--tag' => 'sampaui-assets',
            '--force' => $force,
        ]);

        if ($this->confirm('Publish SampaUI views for customization?', false)) {
            $this->call('vendor:publish', [
                '--tag' => 'sampaui-views',
                '--force' => $force,
            ]);
        }

        if (! $this->option('skip-frontend')) {
            $this->installFrontendImports();
        }

        $this->components->info('SampaUI installed successfully.');

        return self::SUCCESS;
    }

    private function installFrontendImports(): void
    {
        $cssPath = resource_path('css/app.css');
        $jsPath = resource_path('js/app.js');

        $this->ensureCssImport(
            $cssPath,
            '@import url("https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@300;400;500;600;700;800;900&display=swap");',
            prepend: true
        );
        $this->ensureCssImport($cssPath, '@import "../../vendor/sampaui/sampaui/dist/sampaui.css";');
        $this->ensureJsImport($jsPath, 'import "../../vendor/sampaui/sampaui/dist/sampaui.js";');
    }

    private function ensureCssImport(string $path, string $import, bool $prepend = false): void
    {
        File::ensureDirectoryExists(dirname($path));

        if (! File::exists($path)) {
            File::put($path, $import.PHP_EOL.'@import "tailwindcss";'.PHP_EOL);
            $this->components->info('Created resources/css/app.css with SampaUI import.');

            return;
        }

        $contents = File::get($path);

        if ($this->cssImportExists($contents, $import)) {
            $this->components->info('SampaUI CSS import already exists.');

            return;
        }

        $lines = preg_split('/\R/', $contents);
        $insertAt = $prepend ? 0 : 0;

        if ($prepend && isset($lines[0]) && str_starts_with(trim($lines[0]), '@charset')) {
            $insertAt = 1;
        }

        if (! $prepend) {
            while (isset($lines[$insertAt]) && (
                str_starts_with(trim($lines[$insertAt]), '@charset')
                || str_starts_with(trim($lines[$insertAt]), '@import ')
            )) {
                $insertAt++;
            }
        }

        array_splice($lines, $insertAt, 0, $import);

        File::put($path, rtrim(implode(PHP_EOL, $lines)).PHP_EOL);
        $this->components->info('Added SampaUI CSS import to resources/css/app.css.');
    }

    private function cssImportExists(string $contents, string $import): bool
    {
        if (str_contains($contents, $import)) {
            return true;
        }

        if (str_contains($import, 'fonts.googleapis.com')) {
            return str_contains($contents, 'fonts.googleapis.com/css2?family=Plus+Jakarta+Sans');
        }

        if (str_contains($import, 'vendor/sampaui/sampaui/dist/sampaui.css')) {
            return str_contains($contents, 'vendor/sampaui/sampaui/dist/sampaui.css');
        }

        return false;
    }

    private function ensureJsImport(string $path, string $import): void
    {
        File::ensureDirectoryExists(dirname($path));

        if (! File::exists($path)) {
            File::put($path, $import.PHP_EOL);
            $this->components->info('Created resources/js/app.js with SampaUI import.');

            return;
        }

        $contents = File::get($path);

        if (str_contains($contents, 'vendor/sampaui/sampaui/dist/sampaui.js')) {
            $this->components->info('SampaUI JS import already exists.');

            return;
        }

        File::put($path, rtrim($contents).PHP_EOL.PHP_EOL.$import.PHP_EOL);
        $this->components->info('Added SampaUI JS import to resources/js/app.js.');
    }
}
