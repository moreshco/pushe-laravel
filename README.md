# Pushe Laravel Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/moreshco/pushe-laravel.svg?style=flat-square)](https://packagist.org/packages/moreshco/pushe-laravel)
[![Total Downloads](https://img.shields.io/packagist/dt/moreshco/pushe-laravel?style=social)](https://packagist.org/packages/moreshco/pushe-laravel)

[Pushe Laravel](https://github.com/moreshco/pushe-laravel) is a simple laravel package for [Pushe](https://pushe.co) push notification platform. You can use it for simple usages in laravel projects. 

## Installation

You can install the package via composer:

```bash
composer require moreshco/pushe-laravel
```

## Usage

First of all, please publish config file by this command:

``` php
php artisan vendor:publish --provider="Moreshco\PusheLaravel\PusheLaravelServiceProvider" --tag="config"
```
In config file, (located in `config` directory and named `pushe.php`) you must fill `apps` variable.
Then you should `use Moreshco\PusheLaravel\PusheLaravel;` in your file. And finally you can `new PusheLaravel();` in a proper way. Your object instance is ready to go. 



### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email ali@moreshco.ir instead of using the issue tracker.

## Credits

- [MoreshCo](https://github.com/moreshco)
- [Seyed Ali Ahmadnejad](https://github.com/saahmadnejad)
- [Amir Hojati](https://gitlab.com/Amir_h)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
