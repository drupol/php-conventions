<?php

namespace drupol\PhpConventions\PhpCsFixer\Config;

/**
 * Class Php71.
 */
class Php71 extends Php7
{
  /**
   * @var string
   */
  public static $filename = 'resources/php71/php-cs-fixer/phpcsfixer.rules.yml';

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return 'drupol/php-conventions/php71';
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
