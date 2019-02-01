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
  public $filename = 'config/php56/phpcsfixer.rules.yml';

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return 'drupol/php-conventions/php56';
  }
}
