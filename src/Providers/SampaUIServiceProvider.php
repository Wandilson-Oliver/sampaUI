<?php

namespace SampaUI\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use SampaUI\Commands\AboutCommand;
use SampaUI\Commands\AddComponentCommand;
use SampaUI\Commands\DocsExportCommand;
use SampaUI\Commands\DoctorCommand;
use SampaUI\Commands\InstallCommand;
use SampaUI\Commands\ListComponentsCommand;

class SampaUIServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/sampaui.php', 'sampaui');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'sampaui');

        Blade::anonymousComponentPath(
            __DIR__.'/../../resources/views/components',
            config('sampaui.component_prefix', 'sampaui')
        );

        if ($this->app->runningInConsole()) {
            $this->commands([
                AboutCommand::class,
                AddComponentCommand::class,
                DocsExportCommand::class,
                DoctorCommand::class,
                InstallCommand::class,
                ListComponentsCommand::class,
            ]);

            $this->publishes([
                __DIR__.'/../../config/sampaui.php' => config_path('sampaui.php'),
            ], 'sampaui-config');

            $this->publishes([
                __DIR__.'/../../resources/views' => resource_path('views/vendor/sampaui'),
            ], 'sampaui-views');

            $this->publishes([
                __DIR__.'/../../dist' => public_path('vendor/sampaui'),
            ], 'sampaui-assets');
        }
    }
}
