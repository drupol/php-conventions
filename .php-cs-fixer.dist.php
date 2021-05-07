<?php

$config = require __DIR__ . '/config/php73/php_cs_fixer.config.php';

$config
    ->getFinder()
    ->in(['config/']);

$config
    ->getFinder()
    ->ignoreDotFiles(false);

return $config;
