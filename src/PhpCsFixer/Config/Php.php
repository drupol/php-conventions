<?php

namespace drupol\PhpConventions\PhpCsFixer\Config;

use PhpCsFixer\Finder;
use Symfony\Component\Yaml\Yaml;

/**
 * Class Php.
 */
abstract class Php extends \PhpCsFixer\Config implements Config
{
  /**
   * @var string
   */
  public static $filename = 'resources/php/php-cs-fixer/phpcsfixer.rules.yml';

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

  /**
   * {@inheritdoc}
   */
  abstract public function alterCustomFixers(array &$fixers);

  /**
   * {@inheritdoc}
   */
  abstract public function alterRules(array &$rules);

  /**
   * {@inheritdoc}
   */
  final public function getCustomFixers(): array
  {
    $fixers = parent::getCustomFixers();

    // @todo: is this really required.
    $this->alterCustomFixers($fixers);

    return $fixers;
  }

  /**
   * {@inheritdoc}
   */
  final public function getRules()
  {
    $rules = parent::getRules();

    $classes = class_parents(static::class);
    array_unshift($classes, static::class);

    foreach (array_reverse(array_values($classes)) as $class) {
      if (!isset($class::$filename)) {
        continue;
      }

      $filename = __DIR__ . '/../../../' . $class::$filename;

      if (!file_exists($filename)) {
        continue;
      }

      $parsed = (array) Yaml::parseFile($filename);
      $parsed['parameters'] = (array) $parsed['parameters'] + ['rules' => []];

      $rules = array_merge($rules, $parsed['parameters']['rules']);
    }

    // @todo: is this really required.
    $this->alterRules($rules);

    ksort($rules);

    return $rules;
  }
}
