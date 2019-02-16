<?php

namespace drupol\PhpConventions\PhpCsFixer\Config;

/**
 * Class Php7.
 */
class Php7 extends Php
{
  /**
   * @var string
   */
  public static $filename = 'resources/php7/php-cs-fixer/phpcsfixer.rules.yml';

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return 'drupol/php-conventions/php7';
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
