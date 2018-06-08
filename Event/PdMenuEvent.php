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

namespace Pd\MenuBundle\Event;

use Pd\MenuBundle\Builder\ItemInterface;
use Symfony\Component\EventDispatcher\Event;

class PdMenuEvent extends Event
{
    /**
     * @var ItemInterface
     */
    protected $menu;

    /**
     * MainNavEvent constructor.
     *
     * @param ItemInterface $menu
     */
    public function __construct(ItemInterface $menu)
    {
        $this->menu = $menu;
    }

    /**
     * Get Menu.
     *
     * @return ItemInterface
     */
    public function getMenu()
    {
        return $this->menu;
    }
}
