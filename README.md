# Blade Meteocons

<a href="https://github.com/tempi-marathon/blade-meteocons/actions?query=workflow%3ATests">
    <img src="https://github.com/tempi-marathon/blade-meteocons/workflows/Tests/badge.svg" alt="Tests">
</a>
<a href="https://packagist.org/packages/tempi-marathon/blade-meteocons">
    <img src="https://img.shields.io/packagist/v/tempi-marathon/blade-meteocons" alt="Latest Stable Version">
</a>
<a href="https://packagist.org/packages/tempi-marathon/blade-meteocons">
    <img src="https://img.shields.io/packagist/dt/tempi-marathon/blade-meteocons" alt="Total Downloads">
</a>

A package to easily make use of [Meteocons](https://meteocons.com) in your Laravel Blade views.

For a full list of available icons see [the SVG directory](resources/svg) or preview them at [meteocons.com](https://meteocons.com).

## Requirements

- PHP 8.2 or higher
- Laravel 10.0 or higher

## Installation

```bash
composer require tempi-marathon/blade-meteocons
```

## Updating

Please refer to [`the upgrade guide`](UPGRADE.md) when updating the library.

To regenerate icons from upstream locally:

```bash
npm install
composer install
vendor/bin/blade-icons-generate
```

## Blade Icons

Blade Meteocons uses Blade Icons under the hood. Please refer to [the Blade Icons readme](https://github.com/driesvints/blade-icons) for additional functionality. We also recommend to [enable icon caching](https://github.com/driesvints/blade-icons#caching) with this library.

## Configuration

Blade Meteocons also offers the ability to use features from Blade Icons like default classes, default attributes, etc. If you'd like to configure these, publish the `blade-meteocons.php` config file:

```bash
php artisan vendor:publish --tag=blade-meteocons-config
```

## Variants

Icons are generated from both `@meteocons/svg` (animated) and `@meteocons/svg-static` (static), across all four styles:

| Prefix | Source | Notes |
| --- | --- | --- |
| `fill-` | Animated fill | Self-colored illustration |
| `flat-` | Animated flat | Self-colored illustration |
| `line-` | Animated line | Self-colored illustration |
| `mono-` | Animated monochrome | Tintable via `currentColor` / `text-*` |
| `static-fill-` | Static fill | Self-colored illustration |
| `static-flat-` | Static flat | Self-colored illustration |
| `static-line-` | Static line | Self-colored illustration |
| `static-mono-` | Static monochrome | Tintable via `currentColor` / `text-*` |

**Tinting caveat:** only `mono-` and `static-mono-` icons are designed to inherit `currentColor`. Fill, flat, and line variants (animated or static) keep baked-in colors and — for animated sources — SMIL animations. Treat those as illustrations rather than UI icons you recolor with utility classes.

## Usage

Icons can be used as self-closing Blade components which will be compiled to SVG icons:

```blade
<x-meteocon-static-mono-clear-day/>
```

You can also pass classes to your icon components:

```blade
<x-meteocon-static-mono-clear-day class="w-6 h-6 text-sky-500"/>
```

And even use inline styles:

```blade
<x-meteocon-static-mono-clear-day style="color: #555"/>
```

Animated fill icons can be referenced like this:

```blade
<x-meteocon-fill-clear-day class="w-12 h-12"/>
```

### Helpers and directives

```blade
@svg('meteocon-mono-rain')

{{ svg('meteocon-line-cloudy') }}
```

### Filament

Because Filament uses Blade Icons, pass the icon name wherever Filament accepts an icon string:

```php
Actions\Action::make('weather')
    ->icon('meteocon-static-mono-clear-day');
```

### Raw SVG Icons

If you want to use the raw SVG icons as assets, you can publish them using:

```bash
php artisan vendor:publish --tag=blade-meteocons --force
```

Then use them in your views like:

```blade
<img src="{{ asset('vendor/blade-meteocons/static-mono-clear-day.svg') }}" width="64" height="64"/>
```

## Changelog

Check out the [CHANGELOG](CHANGELOG.md) in this repository for all the recent changes.

## Maintainers

Blade Meteocons is developed and maintained by [tempi-marathon](https://github.com/tempi-marathon).

Icons are designed by [Bas Milius](https://bas.dev) as part of [Meteocons](https://meteocons.com).

## License

Blade Meteocons is open-sourced software licensed under [the MIT license](LICENSE.md).

The bundled Meteocons icons are also MIT-licensed — copyright (c) 2020-present Bas Milius.
