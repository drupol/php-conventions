<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

use drupol\PhpCsFixerConfigsPhp\Config\Php73;

$config = new Php73();
$rules = $config->getRules();

$rules['header_comment'] = [
    'commentType' => 'PHPDoc',
    'header' => trim(file_get_contents(__DIR__ . '/../../resource/header.txt')),
    'location' => 'after_open',
    'separate' => 'both',
];

return $config->setRules($rules);
