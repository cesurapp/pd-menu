<?php

/**
 * This file is part of the pd-admin pd-menu package.
 *
 * @package     pd-menu
 * @license     LICENSE
 * @author      Ramazan APAYDIN <apaydin541@gmail.com>
 * @link        https://github.com/appaydin/pd-menu
 */

namespace Pd\MenuBundle\DependencyInjection;

use Pd\MenuBundle\Builder\MenuInterface;
use Pd\MenuBundle\Locator\MenuLocator;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @see http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class PdMenuExtension extends Extension implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        // Load Menu Service Locator
        $container->registerForAutoconfiguration(MenuInterface::class)->addTag('menus');

        // Load Configuration
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        // Set Configuration
        $container->setParameter('pd_menu', $config);

        // Load Services
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    public function process(ContainerBuilder $container)
    {
        $menuIds = [];
        foreach ($container->findTaggedServiceIds('menus') as $id => $tags) {
            $menuIds[$id] = new Reference($id);
        }
        $menuLocator = $container->getDefinition(MenuLocator::class);
        $menuLocator->setArguments([$menuIds]);
    }
}
