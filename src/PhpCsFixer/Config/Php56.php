<?php

namespace drupol\PhpConventions\PhpCsFixer\Config;

/**
 * Class Php56.
 */
class Php56 extends Php
{
  /**
   * @var string
   */
  public static $filename = 'resources/php56/php-cs-fixer/phpcsfixer.rules.yml';

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return 'drupol/php-conventions/php56';
  }

  /**
   * {@inheritdoc}
   */
  public function alterCustomFixers(array &$fixers) {
  }

  /**
   * {@inheritdoc}
   */
  public function alterRules(array &$rules) {
  }
}
