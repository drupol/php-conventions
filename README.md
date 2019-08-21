[![Latest Stable Version](https://img.shields.io/packagist/v/drupol/php-conventions.svg?style=flat-square)](https://packagist.org/packages/drupol/php-conventions)
 [![GitHub stars](https://img.shields.io/github/stars/drupol/php-conventions.svg?style=flat-square)](https://packagist.org/packages/drupol/php-conventions)
 [![Total Downloads](https://img.shields.io/packagist/dt/drupol/php-conventions.svg?style=flat-square)](https://packagist.org/packages/drupol/php-conventions)
 [![License](https://img.shields.io/packagist/l/drupol/php-conventions.svg?style=flat-square)](https://packagist.org/packages/drupol/php-conventions)
 [![Say Thanks!](https://img.shields.io/badge/Say-thanks-brightgreen.svg?style=flat-square)](https://saythanks.io/to/drupol)
 [![Donate!](https://img.shields.io/badge/Donate-Paypal-brightgreen.svg?style=flat-square)](https://paypal.me/drupol)
 
# PHP conventions

This tool will check your code style against a set of defined tasks and rules. 

It's based on [GrumPHP](https://github.com/phpro/grumphp) and comes with a default configuration, customizable at will.

The following tasks are enabled:
* Composer check
* Composer normalize
* YAML Lint
* JSON Lint
* PHP Lint
* Custom [PHP CS Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) configuration through [drupol/phpcsfixer-configs-php](https://github.com/drupol/phpcsfixer-configs-php)
* PHP Codesniffer
* PHP Stan

You can also add or skip tasks if needed.  

The following versions of PHP are supported:

* PHP 5.6
* PHP 7
* PHP 7.1
* PHP 7.3

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

Replace the string `php7` with the minimal version of php you want to support.

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
    phpstan:
      always_execute: false
  skip_tasks:
    - composer
```

In conjunction with `extra_tasks`, use `skip_tasks` to skip tasks if needed.

## Contributing

See the file [CONTRIBUTING.md](.github/CONTRIBUTING.md) but feel free to contribute to this library by sending Github pull requests.
