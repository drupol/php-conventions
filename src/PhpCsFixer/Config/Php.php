<?php

namespace drupol\PhpConventions\PhpCsFixer\Config;

use drupol\DrupalConventions\PhpCsFixer\Fixer\InlineCommentSpacerFixer;
use drupol\DrupalConventions\PhpCsFixer\Fixer\LineLengthFixer;
use drupol\DrupalConventions\PhpCsFixer\Fixer\UppercaseConstantsFixer;
use PhpCsFixer\Config;
use PhpCsFixer\Finder;
use Symfony\Component\Yaml\Yaml;

/**
 * Class Php.
 */
abstract class Php extends Config
{

  /**
   * {@inheritdoc}
   */
  public function getCustomFixers() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getRules() {
    $rules = parent::getRules();

    $filename = __DIR__ . '/../../../' . $this->filename;

    $parsed = (array) Yaml::parseFile($filename) + ['parameters' => []];

    return $parsed['parameters'] + $rules;
  }

  /**
   * {@inheritdoc}
   */
  public function getIndent() {
    return '    ';
  }

  /**
   * {@inheritdoc}
   */
  public function getLineEnding() {
    return "\n";
  }

  /**
   * {@inheritdoc}
   */
  public function getFinder() {
    return Finder::create()
      ->files()
      ->name('*.php')
      ->ignoreDotFiles(true)
      ->ignoreVCS(true)
      ->exclude(['build', 'libraries', 'node_modules', 'vendor'])
      ->in($_SERVER['PWD']);
  }
}
