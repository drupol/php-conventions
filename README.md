[![Latest Stable Version](https://img.shields.io/packagist/v/drupol/php-conventions.svg?style=flat-square)](https://packagist.org/packages/drupol/php-conventions)
 [![GitHub stars](https://img.shields.io/github/stars/drupol/php-conventions.svg?style=flat-square)](https://packagist.org/packages/drupol/php-conventions)
 [![Total Downloads](https://img.shields.io/packagist/dt/drupol/php-conventions.svg?style=flat-square)](https://packagist.org/packages/drupol/php-conventions)
 [![License](https://img.shields.io/packagist/l/drupol/php-conventions.svg?style=flat-square)](https://packagist.org/packages/drupol/php-conventions)
 [![Say Thanks!](https://img.shields.io/badge/Say-thanks-brightgreen.svg?style=flat-square)](https://saythanks.io/to/drupol)
 [![Donate!](https://img.shields.io/badge/Donate-Paypal-brightgreen.svg?style=flat-square)](https://paypal.me/drupol)

# PHP conventions

This development tool provides a pre-defined configuration for [GrumPHP](https://github.com/phpro/grumphp) with the
following checks enabled:

* composer.json validation,
* composer.json normalization ([ergebnis/composer-normalize](https://packagist.org/packages/ergebnis/composer-normalize)),
* YAML Lint,
* JSON Lint,
* PHP Lint ([php-parallel-lint/php-parallel-lint](https://packagist.org/packages/php-parallel-lint/php-parallel-lint)),
* Twig CS ([friendsoftwig/twigcs](https://packagist.org/packages/friendsoftwig/twigcs)),
* [PHP CS Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) checks and fixes ([PSR12 or some other custom ones](https://packagist.org/packages/drupol/phpcsfixer-configs-php)),
* PHP CS ([PHP CS](https://packagist.org/packages/squizlabs/php_codesniffer)),
* PHP Stan ([PHPStan](https://packagist.org/packages/phpstan/phpstan))

The package provides a default configuration for each task, and it's customizable at will through a simple configuration
file.

The package will install the required dependencies, so it works out of the box.

Tasks can be also added or skipped according to your need.

The following versions of PHP are supported:

* PHP 5.6
* PHP 7
* PHP 7.1
* PHP 7.3
* PHP 7.4

## Installation

```shell
composer require drupol/php-conventions --dev
```

### If you're not using GrumPHP

Manually add to your `composer.json` file

```yaml
    "extra": {
        "grumphp": {
            "config-default-path": "vendor/drupol/php-conventions/config/php71/grumphp.yml"
        }
    }
```

Replace the string `php71` with the minimal version of php you want to support.

Current choices are:

* `psr12`
* `php56`
* `php7`
* `php71`
* `php73`

### If you're using GrumPHP already

Edit the file `grumphp.yml.dist` or `grumphp.yml` and add on the top it:

```yaml
imports:
  - { resource: vendor/drupol/php-conventions/config/php71/grumphp.yml }
```

To add an extra Grumphp task:

```yaml
imports:
  - { resource: vendor/drupol/php-conventions/config/php71/grumphp.yml }

parameters:
  extra_tasks:
    infection:
      threads: 10
      test_framework: phpspec
      configuration: infection.json.dist
      min_msi: 60
      min_covered_msi: 60
      metadata:
        priority: 2000
  skip_tasks:
    - phpcs
```

In conjunction with `extra_tasks`, use `skip_tasks` to skip tasks if needed.

## Contributing

See the file [CONTRIBUTING.md](.github/CONTRIBUTING.md) but feel free to contribute to this library by sending Github pull requests.
