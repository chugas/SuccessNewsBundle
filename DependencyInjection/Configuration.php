<?php

namespace Success\NewsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('success_news');

        $rootNode
            //->addDefaultsIfNotSet()
            ->children()
              ->scalarNode('model')
                  ->isRequired()
                  ->cannotBeEmpty()
              ->end()
              ->scalarNode('admin')
                  ->isRequired()
                  ->cannotBeEmpty()
              ->end()
              ->scalarNode('controller')
                  ->isRequired()
                  ->cannotBeEmpty()
              ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
