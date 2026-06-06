<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Support\ComponentRegistry;
use SampaUI\Tests\TestCase;

class ComponentRegistryTest extends TestCase
{
    public function test_every_registered_component_has_blade_doc_and_example(): void
    {
        $root = dirname(__DIR__, 2);
        $registered = ComponentRegistry::all();
        $bladeComponents = collect(glob($root.'/resources/views/components/*.blade.php'))
            ->map(fn (string $path) => basename($path, '.blade.php'))
            ->sort()
            ->values()
            ->all();

        $this->assertSame($bladeComponents, array_keys($registered));

        foreach ($registered as $slug => $component) {
            $this->assertFileExists($root.'/docs/'.$slug.'.md');
            $this->assertNotEmpty($component['tag'] ?? null, $slug.' must define a Blade tag.');
            $this->assertNotEmpty($component['example'] ?? null, $slug.' must define an example.');
            $this->assertIsArray($component['props'] ?? null, $slug.' must define props.');
            $this->assertIsArray($component['slots'] ?? null, $slug.' must define slots.');
            $this->assertIsString($component['livewire'] ?? null, $slug.' must define Livewire notes.');
        }
    }

    public function test_static_json_registry_matches_php_manifest(): void
    {
        $root = dirname(__DIR__, 2);
        $jsonPath = $root.'/docs/registry/components.json';

        $this->assertFileExists($jsonPath);
        $this->assertSame(
            json_encode(ComponentRegistry::manifest(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES).PHP_EOL,
            file_get_contents($jsonPath)
        );
    }
}
