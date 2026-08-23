<?php

namespace SampaUI\Tests\Feature;

use SampaUI\Support\ClassNames;
use SampaUI\Tests\TestCase;

class ClassNamesTest extends TestCase
{
    public function test_classnames_merges_and_resolves_tailwind_conflicts(): void
    {
        $result = ClassNames::merge('p-4 bg-primary text-white', 'p-8 bg-danger');

        $this->assertStringContainsString('p-8', $result);
        $this->assertStringContainsString('bg-danger', $result);
        $this->assertStringNotContainsString('p-4', $result);
        $this->assertStringNotContainsString('bg-primary', $result);
    }

    public function test_sampaui_cn_helper_function(): void
    {
        $result = sampaui_cn(
            'rounded-md font-semibold',
            ['bg-primary' => false, 'bg-success' => true],
            'rounded-full'
        );

        $this->assertStringContainsString('rounded-full', $result);
        $this->assertStringContainsString('bg-success', $result);
        $this->assertStringContainsString('font-semibold', $result);
        $this->assertStringNotContainsString('rounded-md', $result);
    }
}
