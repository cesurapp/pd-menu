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

namespace Pd\MenuBundle\Render;

use Pd\MenuBundle\Builder\ItemInterface;

interface RenderInterface
{
    /**
     * Render Menu.
     *
     * @param ItemInterface $item
     * @param array         $options
     *
     * @return string
     */
    public function render(ItemInterface $item, array $options = []): string;
}
