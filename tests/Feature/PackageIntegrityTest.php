<?php

namespace SampaUI\Tests\Feature;

use SampaUI\SampaUI;
use SampaUI\Tests\TestCase;

class PackageIntegrityTest extends TestCase
{
    public function test_package_versions_stay_in_sync(): void
    {
        $composer = json_decode((string) file_get_contents(__DIR__.'/../../composer.json'), true, flags: JSON_THROW_ON_ERROR);
        $javascript = (string) file_get_contents(__DIR__.'/../../resources/js/sampaui.js');

        $this->assertSame($composer['version'], SampaUI::VERSION);
        $this->assertStringContainsString("version: '{$composer['version']}'", $javascript);
    }

    public function test_overlay_scroll_lock_uses_a_global_counter(): void
    {
        $javascript = (string) file_get_contents(__DIR__.'/../../resources/js/sampaui.js');

        $this->assertStringContainsString('SampaUIOverlayLockCount', $javascript);
        $this->assertStringContainsString('lockPageScroll()', $javascript);
        $this->assertStringContainsString('unlockPageScroll()', $javascript);
    }

    public function test_theme_config_and_compiled_source_tokens_stay_in_sync(): void
    {
        $config = require __DIR__.'/../../config/sampaui.php';
        $css = (string) file_get_contents(__DIR__.'/../../resources/css/sampaui.css');

        foreach ($config['theme'] as $token => $hex) {
            $this->assertStringContainsString("--color-{$token}: {$hex};", $css);
        }
    }

    public function test_overlay_and_chat_controllers_include_cleanup_and_responsive_behaviour(): void
    {
        $javascript = (string) file_get_contents(__DIR__.'/../../resources/js/sampaui.js');

        $this->assertStringContainsString('destroy()', $javascript);
        $this->assertStringContainsString('chatComposer(', $javascript);
        $this->assertStringContainsString('chatConversation(', $javascript);
        $this->assertStringContainsString('requestSubmit()', $javascript);
    }
}
