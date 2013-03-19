<?php

namespace Codepoet\OpcacheProfilerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration
 *
 * @author Benjamin Bender <bb@codepoet.de>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('codepoet_opcache_profiler');

        $rootNode
            ->children()
                ->arrayNode('data_collector')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('show_filelist')->defaultFalse()->end()
                    ->end()
                ->end()
            ->end();


        return $treeBuilder;
    }
}