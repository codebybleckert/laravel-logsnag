# Logsnag for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bleckert/laravel-logsnag.svg?style=flat-square)](https://packagist.org/packages/bleckert/laravel-logsnag)
[![Total Downloads](https://img.shields.io/packagist/dt/bleckert/laravel-logsnag.svg?style=flat-square)](https://packagist.org/packages/bleckert/laravel-logsnag)

Simple Laravel provider for logging to [LogSnag](https://logsnag.com/).

## Installation

You can install the package via composer:

```bash
composer require bleckert/laravel-logsnag
```

## Usage

```php
use Bleckert\LaravelLogsnag\Logsnag;

Logsnag::channel('registrations')->log(
    event: 'User registered',
    icon: '🎉',
    tags: ['user_id' => 1],
);
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

-   [Tobias Bleckert](https://github.com/tbleckert)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.