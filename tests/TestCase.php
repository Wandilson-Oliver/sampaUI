<?php

namespace SampaUI\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use SampaUI\Providers\SampaUIServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            SampaUIServiceProvider::class,
        ];
    }
}
