<?php

$config = require __DIR__ . '/config/php73/php_cs_fixer.config.php';

$config
    ->getFinder()
    ->in(['config/']);

return $config;
