<?php

/**
 * This file is part of the pd-admin pd-menu package.
 *
 * @package     pd-menu
 * @license     LICENSE
 * @author      Kerem APAYDIN <kerem@apaydin.me>
 * @link        https://github.com/appaydin/pd-menu
 */

namespace Pd\MenuBundle\Builder;

/**
 * Menu Item Processor Interface.
 *
 * @author Kerem APAYDIN <kerem@apaydin.me>
 */
interface ItemProcessInterface
{
    /**
     * Item Processor.
     *
     * @param ItemInterface $menu
     * @param array         $options
     *
     * @return ItemInterface
     */
    public function processMenu(ItemInterface $menu, array $options = []): ItemInterface;
}
