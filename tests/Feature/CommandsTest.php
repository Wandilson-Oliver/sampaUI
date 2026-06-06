<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Tests\TestCase;

class CommandsTest extends TestCase
{
    public function test_agent_oriented_commands_execute_successfully(): void
    {
        $this->artisan('sampaui:list')->assertExitCode(0);
        $this->artisan('sampaui:about')->assertExitCode(0);
        $this->artisan('sampaui:doctor')->assertExitCode(0);
    }

    public function test_docs_export_writes_json_and_markdown(): void
    {
        $jsonPath = sys_get_temp_dir().'/sampaui-components-'.uniqid().'.json';
        $markdownPath = sys_get_temp_dir().'/sampaui-components-'.uniqid().'.md';

        $this->artisan('sampaui:docs-export', [
            '--format' => 'json',
            '--path' => $jsonPath,
        ])->assertExitCode(0);

        $this->artisan('sampaui:docs-export', [
            '--format' => 'markdown',
            '--path' => $markdownPath,
        ])->assertExitCode(0);

        $this->assertStringContainsString('"name": "SampaUI"', file_get_contents($jsonPath));
        $this->assertStringContainsString('# SampaUI Component Registry', file_get_contents($markdownPath));
    }
}
