<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace drupol\PhpConventions;

use GrumPHP\Extension\ExtensionInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

use function array_key_exists;
use function in_array;
use function is_array;

final class GrumphpTasksExtension implements ExtensionInterface
{
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

                    if ([] === $testsuites[$id]['tasks']) {
                        unset($testsuites[$id]);
                    }
                }

                $container->setParameter('testsuites', $testsuites);
            }
        }

        if ($container->hasParameter('extra_tasks')) {
            $extra_tasks = $container->getParameter('extra_tasks');

            if (false === is_array($extra_tasks)) {
                throw new RuntimeException(
                    'The extra_tasks parameter must be an array.'
                );
            }

            $tasks = $container->getParameter('tasks');

            foreach ($extra_tasks as $name => $value) {
                if (true === array_key_exists($name, $tasks)) {
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
