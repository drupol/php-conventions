<?php

namespace drupol\PhpConventions\PhpCsFixer\Config;

/**
 * Class Php7.
 */
class Php7 extends Php56
{
  /**
   * @var string
   */
  public static $rules = '/../../../resources/php7/php-cs-fixer/phpcsfixer.rules.yml';

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
