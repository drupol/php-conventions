<?php

namespace drupol\PhpConventions\PhpCsFixer\Config;

/**
 * Class Php73.
 */
class Php73 extends Php71
{
  /**
   * @var string
   */
  public static $filename = 'resources/php73/php-cs-fixer/phpcsfixer.rules.yml';

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return 'drupol/php-conventions/php73';
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
