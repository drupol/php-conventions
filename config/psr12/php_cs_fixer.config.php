<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

use drupol\PhpCsFixerConfigsPhp\Config\Psr12;

$config = new Psr12();
$rules = $config->getRules();

$rules['header_comment'] = [
    'comment_type' => 'PHPDoc',
    'header' => trim(file_get_contents(__DIR__ . '/../../resource/header.txt')),
    'location' => 'after_open',
    'separate' => 'both',
];

return $config->setRules($rules);
