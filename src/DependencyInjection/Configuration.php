<?php

namespace Damian972\OptionsBundle\DependencyInjection;

use Damian972\OptionsBundle\Entity\Option;
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

        $this->addLazyMode($rootNode);
        $this->addTargetEntity($rootNode);

        return $treeBuilder;
    }

    private function addLazyMode(ArrayNodeDefinition $node): void
    {
        $node
            ->children()
            ->booleanNode('lazy')
            ->isRequired()
            ->defaultFalse()
            ->end()
            ->end()
        ;
    }

    private function addTargetEntity(ArrayNodeDefinition &$node): void
    {
        $node
            ->children()
            ->scalarNode('target_entity')
            ->defaultValue(Option::class)
            ->cannotBeEmpty()
            ->end()
            ->end()
        ;
    }
}
