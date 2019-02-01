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
  public $filename = 'config/php7/phpcsfixer.rules.yml';

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return 'drupol/php-conventions/php7';
  }
}
