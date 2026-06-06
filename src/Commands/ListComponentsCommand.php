<?php

namespace SampaUI\Commands;

use Illuminate\Console\Command;
use SampaUI\Support\ComponentRegistry;

class ListComponentsCommand extends Command
{
    protected $signature = 'sampaui:list {--category= : Filter by component category}';

    protected $description = 'List available SampaUI components from the official registry.';

    public function handle(): int
    {
        $filter = $this->option('category');
        $groups = ComponentRegistry::groupedByCategory();

        if (is_string($filter) && $filter !== '') {
            $groups = isset($groups[$filter]) ? [$filter => $groups[$filter]] : [];
        }

        if ($groups === []) {
            $this->components->warn('No SampaUI components found for the selected category.');

            return self::SUCCESS;
        }

        foreach ($groups as $category => $components) {
            $this->components->twoColumnDetail(strtoupper((string) $category), count($components).' components');

            foreach ($components as $slug => $component) {
                $this->line(sprintf('  %-20s %s', $slug, $component['tag']));
            }

            $this->newLine();
        }

        return self::SUCCESS;
    }
}
