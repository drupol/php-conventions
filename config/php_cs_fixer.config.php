<?php

$finder = PhpCsFixer\Finder::create()
  ->in($_SERVER['PWD'])
  ->files()
  ->name('*.php')
  ->ignoreDotFiles(true)
  ->ignoreVCS(true)
  ->exclude(['build', 'vendor']);

return PhpCsFixer\Config::create()
  ->setFinder($finder);
