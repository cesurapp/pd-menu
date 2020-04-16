<?php

/**
 * This file is part of the pd-admin pd-menu package.
 *
 * @package     pd-menu
 * @license     LICENSE
 * @author      Ramazan APAYDIN <apaydin541@gmail.com>
 * @link        https://github.com/appaydin/pd-menu
 */

namespace Pd\MenuBundle\Event;

use Pd\MenuBundle\Builder\ItemInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Menu Event.
 *
 * @author Ramazan APAYDIN <apaydin541@gmail.com>
 */
class PdMenuEvent extends Event
{
    /**
     * @var ItemInterface
     */
    protected $menu;

    public function __construct(ItemInterface $menu)
    {
        $this->menu = $menu;
    }

    /**
     * Get Menu.
     */
    public function getMenu(): ItemInterface
    {
        return $this->menu;
    }
}
