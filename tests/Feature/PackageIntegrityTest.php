<?php

namespace SampaUI\Tests\Feature;

use SampaUI\SampaUI;
use SampaUI\Tests\TestCase;

class PackageIntegrityTest extends TestCase
{
    public function test_package_versions_stay_in_sync(): void
    {
        $composer = json_decode((string) file_get_contents(__DIR__.'/../../composer.json'), true, flags: JSON_THROW_ON_ERROR);
        $registry = json_decode((string) file_get_contents(__DIR__.'/../../docs/registry/components.json'), true, flags: JSON_THROW_ON_ERROR);
        $javascript = (string) file_get_contents(__DIR__.'/../../resources/js/sampaui.js');

        $this->assertArrayNotHasKey('version', $composer, 'Packagist must derive the package version from Git tags.');
        $this->assertSame(SampaUI::VERSION, $registry['version']);
        $this->assertStringContainsString("version: '".SampaUI::VERSION."'", $javascript);
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

    public function test_compiled_assets_include_the_official_brand_mark(): void
    {
        $this->assertFileExists(__DIR__.'/../../resources/images/logo-sampaui-mark.png');
        $this->assertFileExists(__DIR__.'/../../dist/images/logo-sampaui-mark.png');
    }
}
