<?php

namespace Damian972\OptionsBundle\DependencyInjection;

use Damian972\OptionsBundle\Contracts\OptionInterface;
use Damian972\OptionsBundle\Entity\Option;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class DoctrineCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $definition = $container->getDefinition('doctrine.orm.listeners.resolve_target_entity');
        // alias target optionInterface to the Option Entity
        $definition->addMethodCall(
            'addResolveTargetEntity',
            [
                OptionInterface::class,
                $container->getParameter('options.target_entity'),
                [],
            ]
        );
        $definition->addTag('doctrine.event_subscriber');
    }
}
