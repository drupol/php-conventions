<?php

namespace drupol\PhpConventions;

use GrumPHP\Extension\ExtensionInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * Grumphp extension that allows to:
 *
 * 1: define extra tasks
 * 2: skip tasks
 * 3: Update testsuites if needed
 */
class GrumphpTasksExtension implements ExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ContainerBuilder $container): void
    {
        if ($container->hasParameter('skip_tasks')) {
            $tasks = $container->getParameter('tasks');
            $skip_tasks = $container->getParameter('skip_tasks');

            foreach ($skip_tasks as $name) {
                unset($tasks[$name]);
            }

            $container->setParameter('tasks', $tasks);

            if ($container->hasParameter('testsuites')) {
                $testsuites = $container->getParameter('testsuites');

                foreach ($testsuites as $id => $data) {
                    $testsuites[$id]['tasks'] = array_filter(
                        $testsuites[$id]['tasks'],
                        static function (string $task) use ($skip_tasks): bool {
                            return !in_array($task, $skip_tasks, true);
                        }
                    );

                    if ($testsuites[$id]['tasks'] === []) {
                        unset($testsuites[$id]);
                    }
                }

                $container->setParameter('testsuites', $testsuites);
            }
        }

        if ($container->hasParameter('extra_tasks')) {
            $tasks = $container->getParameter('tasks');

            foreach ($container->getParameter('extra_tasks') as $name => $value) {
                if (isset($tasks[$name])) {
                    throw new RuntimeException(
                        sprintf("Cannot override already defined task '%s' in 'extra_tasks'", $name)
                    );
                }

                $tasks[$name] = $value;
            }

            $container->setParameter('tasks', $tasks);
        }
    }
}
