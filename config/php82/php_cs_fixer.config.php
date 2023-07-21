<?php

declare(strict_types=1);

use drupol\PhpCsFixerConfigsPhp\Config\Php82;

$config = new Php82();
$rules = $config->getRules();

return $config->setRules($rules);
