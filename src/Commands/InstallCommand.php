<?php

namespace SampaUI\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'sampaui:install {--force : Overwrite previously published files}';

    protected $description = 'Publish SampaUI configuration, views, and compiled assets.';

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

        $this->components->info('SampaUI installed successfully.');

        return self::SUCCESS;
    }
}
