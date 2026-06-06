<?php

namespace SampaUI\Support;

class ComponentRegistry
{
    /**
     * @return array<string, array<string, mixed>>
     */
    public static function all(): array
    {
        $components = require __DIR__.'/../../resources/metadata/components.php';

        ksort($components);

        return $components;
    }

    /**
     * @return array<string, array<string, array<string, mixed>>>
     */
    public static function groupedByCategory(): array
    {
        $grouped = [];

        foreach (self::all() as $slug => $component) {
            $category = (string) ($component['category'] ?? 'other');
            $grouped[$category][$slug] = $component;
        }

        ksort($grouped);

        return $grouped;
    }

    /**
     * @return array<string, mixed>
     */
    public static function manifest(): array
    {
        return [
            'name' => 'SampaUI',
            'version' => \SampaUI\SampaUI::VERSION,
            'stack' => ['Laravel 13+', 'Livewire 4+', 'Tailwind CSS 4', 'AlpineJS', 'Bootstrap Icons'],
            'component_prefix' => 'sampaui',
            'components' => self::all(),
        ];
    }
}
