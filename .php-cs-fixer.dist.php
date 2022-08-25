<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

use drupol\PhpCsFixerConfigsPhp\Config\Php73;

$config = new Php73();

$config
    ->getFinder()
    ->in(['config/']);

$config
    ->getFinder()
    ->ignoreDotFiles(false);

return $config;
