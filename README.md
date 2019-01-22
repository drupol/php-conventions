# PHP conventions

This tool will check your code style.

It's based on [GrumPHP](https://github.com/phpro/grumphp) and comes with a default configuration.

The following checks are triggered:
* Custom [PHP CS Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) configuration
* Git commit message checks

## Installation

```shell
composer require drupol/php-conventions --dev
```

### If you're not using GrumPHP

Manually add to your `composer.json` file:

```yaml
    "extra": {
        "grumphp": {
            "config-default-path": "vendor/drupol/php-conventions/config/grumphp.yml"
        }
    }
```

### If you're using GrumPHP already

Edit the file `grumphp.yml.dist` or `grumphp.yml` and add on the top it:

```yaml
imports:
  - { resource: vendor/drupol/php-conventions/config/grumphp.yml }
```

## Contributing

Feel free to contribute to this library by sending Github pull requests. I'm quite reactive :-)
