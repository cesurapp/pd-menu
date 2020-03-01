<?php

/**
 * This file is part of the pd-admin pd-menu package.
 *
 * @package     pd-menu
 * @license     LICENSE
 * @author      Ramazan APAYDIN <apaydin541@gmail.com>
 * @link        https://github.com/appaydin/pd-menu
 */

namespace Pd\MenuBundle\Builder;

/**
 * Menu Item Processor Interface.
 *
 * @author Ramazan APAYDIN <apaydin541@gmail.com>
 */
interface ItemProcessInterface
{
    /**
     * Item Processor.
     */
    public function processMenu(ItemInterface $menu, array $options = []): ItemInterface;
}
