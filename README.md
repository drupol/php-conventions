[![Latest Stable Version][latest stable version]][1]
 [![GitHub stars][github stars]][1]
 [![Total Downloads][total downloads]][1]
 [![License][license]][1]

# PHP conventions

## Description

A developer tool which provides a pre-defined [GrumPHP][5] configuration
tailored specifically for PHP development.

## Features

The default [GrumPHP][5] configuration ships with the following checks:

* [License file][21] creation,
* [Composer Require Checker][22],
* composer.json validation,
* [composer.json normalization][7],
* YAML Lint,
* JSON Lint,
* [PHP Lint][8],
* [Twig CS][9],
* [PHP CS Fixer][10] checks (*Based on [PSR12][11]*),
* [PHP CS][12],
* [PHPStan][13].
* [PSalm][14],

It provides a default configuration for each task, and they are customizable at
will through a simple YAML configuration file.

Tasks can be also added or skipped according to your need.

## Installation

```shell
composer require drupol/php-conventions --dev
```

### If you're not using GrumPHP

Manually add to your `composer.json` file

```yaml
    "extra": {
        "grumphp": {
            "config-default-path": "vendor/drupol/php-conventions/config/php73/grumphp.yml"
        }
    }
```

Replace the string `php73` with the minimal version of PHP you want to support.

Current choices are:

* `psr12`

### If you're using GrumPHP already

Edit the file `grumphp.yml.dist` or `grumphp.yml` and add on the top it:

```yaml
imports:
  - { resource: vendor/drupol/php-conventions/config/php73/grumphp.yml }
```

To add an extra GrumPHP task:

```yaml
imports:
  - { resource: vendor/drupol/php-conventions/config/php73/grumphp.yml }

parameters:
  extra_tasks:
    infection:
      threads: 1
      test_framework: phpspec
      configuration: infection.json.dist
      min_msi: 60
      min_covered_msi: 60
  skip_tasks:
    - phpcs
```

In conjunction with `extra_tasks`, use `skip_tasks` to skip tasks if needed.

## Usage

## Basic usage

```shell
vendor/bin/grumphp run
```

This will run all the pre-configured tasks.

### Advanced usage

If you're willing to specify a group of tasks only, you can use the
pre-defined test suites.

Available test-suites are:

* `cs`
  * license
  * composer_require_checker
  * composer
  * composer_normalize
  * yamllint
  * jsonlint
  * phplint
  * twigcs
  * phpcsfixer
  * phpcs
* `static-analysis`
  * phpstan

To run a particular test-suite:

```shell
vendor/bin/grumphp run --testsuite=cs
```

To run particular tasks:

```shell
vendor/bin/grumphp run --tasks=phpcsfixer,phpcs
```

## Contributing

Report bug on the [issue tracker][14].

See the file [CONTRIBUTING.md][18] but feel free to contribute to this library by sending Github pull requests.

## Changelog

See [CHANGELOG.md][15] for a changelog based on [git commits][16].

For more detailed changelogs, please check [the release changelogs][17].

To generate the changelog, use the following command:

```shell
docker-compose run auto_changelog  --commit-limit false --hide-credit --sort-commits date-desc --breaking-pattern ""BREAKING CHANGE: yes" --template keepachangelog -u
```

[latest stable version]: https://img.shields.io/packagist/v/drupol/php-conventions.svg?style=flat-square
[github stars]: https://img.shields.io/github/stars/drupol/php-conventions.svg?style=flat-square
[total downloads]: https://img.shields.io/packagist/dt/drupol/php-conventions.svg?style=flat-square
[license]: https://img.shields.io/packagist/l/drupol/php-conventions.svg?style=flat-square
[1]: https://packagist.org/packages/drupol/php-conventions
[2]: https://github.com/drupol/php-conventions/actions
[3]: https://scrutinizer-ci.com/g/drupol/php-conventions/?branch=master
[4]: https://shepherd.dev/github/drupol/php-conventions
[5]: https://packagist.org/packages/grumphp/grumphp
[7]: https://packagist.org/packages/ergebnis/composer-normalize
[8]: https://packagist.org/packages/php-parallel-lint/php-parallel-lint
[9]: https://packagist.org/packages/friendsoftwig/twigcs
[10]: https://packagist.org/packages/FriendsOfPHP/PHP-CS-Fixer
[11]: https://www.php-fig.org/psr/psr-12/
[12]: https://packagist.org/packages/squizlabs/php_codesniffer
[13]: https://packagist.org/packages/phpstan/phpstan
[14]: https://github.com/drupol/php-conventions/issues
[15]: https://github.com/drupol/php-conventions/blob/master/CHANGELOG.md
[16]: https://github.com/drupol/php-conventions/commits/master
[17]: https://github.com/drupol/php-conventions/releases
[18]: https://github.com/drupol/php-conventions/blob/master/.github/CONTRIBUTING.md
[19]: https://packagist.org/packages/vimeo/psalm
[20]: https://packagist.org/packages/ergebnis/php-library-template
[21]: https://packagist.org/packages/loophp/grumphp-license-task
[22]: https://packagist.org/packages/maglnet/composer-require-checker
