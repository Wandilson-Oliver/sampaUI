<?php

namespace SampaUI\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use SampaUI\Support\ComponentRegistry;

class DocsExportCommand extends Command
{
    protected $signature = 'sampaui:docs-export
        {--format=json : Export format: json or markdown}
        {--path= : Output file path}';

    protected $description = 'Export the SampaUI component registry for documentation and AI agents.';

    public function handle(): int
    {
        $format = strtolower((string) $this->option('format'));

        if (! in_array($format, ['json', 'markdown'], true)) {
            $this->components->error('Invalid format. Use json or markdown.');

            return self::FAILURE;
        }

        $path = $this->outputPath($format);
        File::ensureDirectoryExists(dirname($path));
        File::put($path, $format === 'json' ? $this->json() : $this->markdown());

        $this->components->info('SampaUI docs exported to '.$path);

        return self::SUCCESS;
    }

    private function outputPath(string $format): string
    {
        $path = $this->option('path');

        if (is_string($path) && $path !== '') {
            return $path;
        }

        return base_path($format === 'json' ? 'docs/registry/components.json' : 'llms-full.txt');
    }

    private function json(): string
    {
        return json_encode(ComponentRegistry::manifest(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES).PHP_EOL;
    }

    private function markdown(): string
    {
        $lines = [
            '# SampaUI Component Registry',
            '',
            'Stack: Laravel 13+, Livewire 4+, Tailwind CSS 4, AlpineJS, Bootstrap Icons.',
            '',
        ];

        foreach (ComponentRegistry::groupedByCategory() as $category => $components) {
            $lines[] = '## '.ucfirst((string) $category);
            $lines[] = '';

            foreach ($components as $slug => $component) {
                $lines[] = '- `'.$slug.'` '.$component['tag'].' - '.$component['example'];
            }

            $lines[] = '';
        }

        return implode(PHP_EOL, $lines);
    }
}
