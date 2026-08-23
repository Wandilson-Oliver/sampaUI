<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Support\ComponentRegistry;
use SampaUI\Tests\TestCase;

class DocumentationContractTest extends TestCase
{
    public function test_every_component_guide_has_the_standard_sections(): void
    {
        $root = dirname(__DIR__, 2);

        foreach (array_keys(ComponentRegistry::all()) as $slug) {
            $documentation = (string) file_get_contents($root.'/docs/'.$slug.'.md');

            foreach (['## Uso', '## Propriedades', '## Exemplos', '## Boas práticas'] as $section) {
                $this->assertStringContainsString($section, $documentation, "{$slug} must document {$section}.");
            }
        }
    }

    public function test_the_registry_describes_the_real_public_accordion_and_tooltip_apis(): void
    {
        $components = ComponentRegistry::all();

        $this->assertSame(['items', 'multiple'], $components['accordion']['props']);
        $this->assertSame(['text', 'position'], $components['tooltip']['props']);
        $this->assertContains('role', $components['alert']['props']);
        $this->assertNotContains('dismissible', $components['alert']['props']);
    }
}
