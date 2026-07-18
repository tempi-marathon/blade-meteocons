<?php

declare(strict_types=1);

namespace Tests;

use BladeUI\Icons\BladeIconsServiceProvider;
use Orchestra\Testbench\TestCase;
use TempiMarathon\BladeMeteocons\BladeMeteoconsServiceProvider;

class CompilesIconsTest extends TestCase
{
    public function test_it_compiles_a_single_anonymous_component(): void
    {
        $result = svg('meteocon-static-mono-clear-day')->toHtml();

        $this->assertStringContainsString('<svg', $result);
        $this->assertStringContainsString('currentColor', $result);
        $this->assertStringContainsString('viewBox="0 0 128 128"', $result);
    }

    public function test_it_can_add_classes_to_icons(): void
    {
        $result = svg('meteocon-static-mono-clear-day', 'w-6 h-6 text-gray-500')->toHtml();

        $this->assertStringContainsString('class="w-6 h-6 text-gray-500"', $result);
        $this->assertStringContainsString('<svg', $result);
    }

    public function test_it_can_add_styles_to_icons(): void
    {
        $result = svg('meteocon-static-mono-clear-day', ['style' => 'color: #555'])->toHtml();

        $this->assertStringContainsString('style="color: #555"', $result);
        $this->assertStringContainsString('<svg', $result);
    }

    public function test_it_compiles_all_variant_prefixes(): void
    {
        $variants = [
            'meteocon-fill-clear-day',
            'meteocon-flat-clear-day',
            'meteocon-line-clear-day',
            'meteocon-mono-clear-day',
            'meteocon-static-fill-clear-day',
            'meteocon-static-flat-clear-day',
            'meteocon-static-line-clear-day',
            'meteocon-static-mono-clear-day',
        ];

        foreach ($variants as $icon) {
            $result = svg($icon)->toHtml();

            $this->assertStringContainsString('<svg', $result, "Expected {$icon} to compile to an SVG.");
        }
    }

    protected function getPackageProviders($app): array
    {
        return [
            BladeIconsServiceProvider::class,
            BladeMeteoconsServiceProvider::class,
        ];
    }
}
