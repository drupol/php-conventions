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
    public static $rules = '/../../../resources/php/php-cs-fixer/phpcsfixer.rules.yml';

    /**
     * {@inheritdoc}
     */
    final public function getName() {
        $classes = class_parents(static::class);
        array_pop($classes);
        array_unshift($classes, static::class);

        $names = [];
        foreach (array_reverse(array_values($classes)) as $class) {
            $reflection = new \ReflectionClass($class);
            $names[] = $reflection->getShortName();
        }

        return 'drupol/php-conventions/' . implode('/', $names);
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
        return PHP_EOL;
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
    public function getCustomFixers()
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
            if (!isset($class::$rules)) {
                continue;
            }

            $reflection = new \ReflectionClass($class);
            $classFilename = $reflection->getFileName();

            $filename = realpath(dirname($classFilename) . $class::$rules);

            if (false === $filename) {
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
