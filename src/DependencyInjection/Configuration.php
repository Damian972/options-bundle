<?php

namespace Damian972\OptionsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('options');
        /**
         * @var ArrayNodeDefinition
         */
        $rootNode = $treeBuilder->getRootNode();

        return $treeBuilder;
    }
}
