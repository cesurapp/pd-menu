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
 * Menu Interface.
 *
 * @author Kerem APAYDIN <kerem@apaydin.me>
 */
interface MenuInterface
{
    /**
     * Create Menu.
     *
     * @param array $options
     *
     * @return ItemInterface
     */
    public function createMenu(array $options = []): ItemInterface;

    /**
     * Create Menu Item.
     *
     * @param string $name
     *
     * @return ItemInterface
     */
    public function createRoot(string $name): ItemInterface;
}
