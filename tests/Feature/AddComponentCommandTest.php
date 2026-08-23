<?php

namespace SampaUI\Tests\Feature;

use Illuminate\Support\Facades\File;
use SampaUI\Tests\TestCase;

class AddComponentCommandTest extends TestCase
{
    protected function tearDown(): void
    {
        $testDir = resource_path('views/components/sampaui');
        if (File::isDirectory($testDir)) {
            File::deleteDirectory($testDir);
        }

        parent::tearDown();
    }

    public function test_add_command_copies_specified_components(): void
    {
        $targetDir = resource_path('views/components/sampaui');

        $this->artisan('sampaui:add', ['components' => ['button', 'badge']])
            ->expectsOutputToContain('Componente <x-sampaui::button /> copiado')
            ->expectsOutputToContain('Componente <x-sampaui::badge /> copiado')
            ->assertSuccessful();

        $this->assertFileExists($targetDir.'/button.blade.php');
        $this->assertFileExists($targetDir.'/badge.blade.php');
    }

    public function test_add_command_warns_when_component_does_not_exist(): void
    {
        $this->artisan('sampaui:add', ['components' => ['non-existent-component']])
            ->expectsOutputToContain("Componente 'non-existent-component' não encontrado")
            ->assertSuccessful();
    }
}
