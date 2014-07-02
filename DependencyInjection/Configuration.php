<?php

namespace Success\NewsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Success\NewsBundle\SuccessNewsBundle;

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
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('driver')->defaultValue(SuccessNewsBundle::DRIVER_DOCTRINE_ORM)->end()                
            ->end()
        ;

        $this->addClassesSection($rootNode);

        return $treeBuilder;
    }
    
    private function addClassesSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('classes')
                    ->addDefaultsIfNotSet()
                    ->children()

                        ->arrayNode('news')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('model')->defaultValue('Success\NewsBundle\Entity\News')->end()
                                ->scalarNode('controller')->defaultValue('Success\NewsBundle\Controller\NewsController')->end()
                                ->scalarNode('repository')->defaultValue('Success\NewsBundle\Doctrine\Repository\NewsRepository')->end()
                                ->scalarNode('manager')->defaultValue('Success\NewsBundle\Doctrine\Manager\NewsManager')->end()                
                                ->scalarNode('form')->defaultValue('Success\NewsBundle\Form\NewsType')->end()
                                ->scalarNode('admin')->defaultValue('Success\NewsBundle\Admin\NewsAdmin')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
