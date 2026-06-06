<?php

namespace SampaUI\Commands;

use Illuminate\Console\Command;
use SampaUI\SampaUI;
use SampaUI\Support\ComponentRegistry;

class AboutCommand extends Command
{
    protected $signature = 'sampaui:about';

    protected $description = 'Show SampaUI version, stack, paths and documentation links.';

    public function handle(): int
    {
        $this->components->info('SampaUI');
        $this->components->twoColumnDetail('Version', SampaUI::VERSION);
        $this->components->twoColumnDetail('Component prefix', (string) config('sampaui.component_prefix', 'sampaui'));
        $this->components->twoColumnDetail('Components', (string) count(ComponentRegistry::all()));
        $this->components->twoColumnDetail('Config', config_path('sampaui.php'));
        $this->components->twoColumnDetail('Published CSS', public_path('vendor/sampaui/sampaui.css'));
        $this->components->twoColumnDetail('Published JS', public_path('vendor/sampaui/sampaui.js'));
        $this->components->twoColumnDetail('Views override path', resource_path('views/vendor/sampaui'));
        $this->components->twoColumnDetail('Laravel docs', 'https://laravel.com/docs/13.x/packages');
        $this->components->twoColumnDetail('Livewire docs', 'https://livewire.laravel.com/docs/4.x/quickstart');

        return self::SUCCESS;
    }
}
