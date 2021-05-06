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
 * Menu Interface.
 *
 * @author Ramazan APAYDIN <apaydin541@gmail.com>
 */
interface MenuInterface
{
    /**
     * Create Menu.
     */
    public function createMenu(array $options = []): ItemInterface;

    /**
     * Create Menu Item.
     */
    public function createRoot(string $name): ItemInterface;
}
