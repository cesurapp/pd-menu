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

class Menu implements MenuInterface
{
    /**
     * Creating Menu.
     *
     * @param array $options
     *
     * @return ItemInterface
     */
    public function createMenu(array $options = []): ItemInterface
    {
        return $this->createRoot('pd_menu');
    }

    /**
     * Create Menu Item.
     *
     * @param string $name
     *
     * @return ItemInterface
     */
    final public function createRoot(string $name, $event = true): ItemInterface
    {
        return new Item($name, $event);
    }
}
