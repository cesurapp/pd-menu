<?php

/**
 * This file is part of the pd-admin pd-menu package.
 *
 * @package     pd-menu
 * @license     LICENSE
 * @author      Kerem APAYDIN <kerem@apaydin.me>
 * @link        https://github.com/appaydin/pd-menu
 */

namespace Pd\MenuBundle\Event;

use Pd\MenuBundle\Builder\ItemInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Menu Event.
 *
 * @author Kerem APAYDIN <kerem@apaydin.me>
 */
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
    public function getMenu(): ItemInterface
    {
        return $this->menu;
    }
}
