<?php

/**
 * This file is part of the pdAdmin pd-menu package.
 *
 * @package     pd-menu
 *
 * @author      Ramazan APAYDIN <iletisim@ramazanapaydin.com>
 * @copyright   Copyright (c) 2018 Ramazan APAYDIN
 * @license     LICENSE
 *
 * @link        https://github.com/rmznpydn/pd-menu
 */

namespace Pd\MenuBundle\Builder;

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
