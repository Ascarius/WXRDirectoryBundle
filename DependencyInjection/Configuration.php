<?php

namespace WXR\DirectoryBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('wxr_directory');

        $rootNode
            ->children()
                ->scalarNode('translation_domain')->defaultValue('WXRDirectoryBundle')->end()
                ->arrayNode('contact')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('manager')->defaultValue('wxr_directory.contact.manager.default')->end()
                        ->arrayNode('admin')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('class')->defaultValue('WXR\DirectoryBundle\Admin\Entity\ContactAdmin')->end()
                                ->scalarNode('controller')->defaultValue('SonataAdminBundle:CRUD')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('category')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('manager')->defaultValue('wxr_directory.category.manager.default')->end()
                        ->arrayNode('admin')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('class')->defaultValue('WXR\DirectoryBundle\Admin\Entity\CategoryAdmin')->end()
                                ->scalarNode('controller')->defaultValue('SonataAdminBundle:CRUD')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
                // ->arrayNode('tag')
                //     ->addDefaultsIfNotSet()
                //     ->children()
                //         ->scalarNode('manager')->defaultValue('wxr_directory.tag.manager.default')->end()
                //         ->arrayNode('admin')
                //             ->addDefaultsIfNotSet()
                //             ->children()
                //                 ->scalarNode('class')->defaultValue('WXR\DirectoryBundle\Admin\Entity\TagAdmin')->end()
                //                 ->scalarNode('controller')->defaultValue('SonataAdminBundle:CRUD')->end()
                //             ->end()
                //         ->end()
                //     ->end()
                // ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}