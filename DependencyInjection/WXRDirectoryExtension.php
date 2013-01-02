<?php

namespace WXR\DirectoryBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class WXRDirectoryExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
   
        $container->setParameter('wxr_directory.translation_domain', $config['translation_domain']);
   
        $container->setAlias('wxr_directory.contact.manager', $config['contact']['manager']);
        $container->setParameter('wxr_directory.contact.admin.class', $config['contact']['admin']['class']);
        $container->setParameter('wxr_directory.contact.admin.controller', $config['contact']['admin']['controller']);
   
        $container->setAlias('wxr_directory.category.manager', $config['category']['manager']);
        $container->setParameter('wxr_directory.category.admin.class', $config['category']['admin']['class']);
        $container->setParameter('wxr_directory.category.admin.controller', $config['category']['admin']['controller']);
   
        // $container->setAlias('wxr_directory.tag.manager', $config['tag']['manager']);
        // $container->setParameter('wxr_directory.tag.admin.class', $config['tag']['admin']['class']);
        // $container->setParameter('wxr_directory.tag.admin.controller', $config['tag']['admin']['controller']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
