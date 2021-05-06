<?php

/**
 * This file is part of the pd-admin pd-user package.
 *
 * @package     pd-user
 * @license     LICENSE
 * @author      Ramazan APAYDIN <apaydin541@gmail.com>
 * @link        https://github.com/appaydin/pd-user
 */

namespace Pd\MenuBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('pd_menu');
        $rootNode = $treeBuilder->getRootNode();

        // Set Configuration
        $rootNode
            ->children()
                ->scalarNode('template')->defaultValue('@PdMenu/Default/menu.html.twig')->end()
                ->scalarNode('depth')->defaultValue(null)->end()
                ->scalarNode('currentClass')->defaultValue('active')->end()
                ->scalarNode('trans_domain')->defaultValue(null)->end()
                ->scalarNode('iconTemplate')->defaultValue('<i class="material-icons">&text</i>')->end()
            ->end();

        return $treeBuilder;
    }
}
