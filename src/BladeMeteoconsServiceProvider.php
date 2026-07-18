<?php

declare(strict_types=1);

namespace TempiMarathon\BladeMeteocons;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladeMeteoconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-meteocons', []);

            $factory->add('meteocons', array_merge(['path' => __DIR__.'/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-meteocons.php', 'blade-meteocons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-meteocons'),
            ], 'blade-meteocons');

            $this->publishes([
                __DIR__.'/../config/blade-meteocons.php' => $this->app->configPath('blade-meteocons.php'),
            ], 'blade-meteocons-config');
        }
    }
}
