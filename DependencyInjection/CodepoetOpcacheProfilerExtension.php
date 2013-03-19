<?php

namespace Codepoet\OpcacheProfilerBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * CodepoetOpcacheProfilerExtension
 *
 * @author Benjamin Bender <bb@codepoet.de>
 */
class CodepoetOpcacheProfilerExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        if (function_exists('opcache_get_status') or function_exists('accelerator_get_status')) {
            $configuration = new Configuration();
            $config = $this->processConfiguration($configuration, $configs);

            $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
            $loader->load('opcache.xml');

            $container->setParameter('codepoet_opcache_profiler.data_collector.show_filelist', $config['data_collector']['show_filelist']);
        }
    }
}
