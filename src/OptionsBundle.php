<?php

namespace Damian972\OptionsBundle;

use Damian972\OptionsBundle\DependencyInjection\DoctrineCompilerPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class OptionsBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        /*
         * Register the Doctrine compiler pass in order to register the alias for the entity choosen
         * NOTE: a priority higher than the default one is required else the alias won't be registered
         * unless using the doctrine.yaml file
         */
        $container->addCompilerPass(new DoctrineCompilerPass(), PassConfig::TYPE_BEFORE_OPTIMIZATION, 256);
    }
}
