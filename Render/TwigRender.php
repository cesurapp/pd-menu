<?php

/**
 * This file is part of the pd-admin pd-menu package.
 *
 * @package     pd-menu
 * @license     LICENSE
 * @author      Kerem APAYDIN <kerem@apaydin.me>
 * @link        https://github.com/appaydin/pd-menu
 */

namespace Pd\MenuBundle\Render;

use Pd\MenuBundle\Builder\ItemInterface;
use Twig\Environment;

/**
 * Menu Twig Rendering.
 *
 * @author Kerem APAYDIN <kerem@apaydin.me>
 */
class TwigRender implements RenderInterface
{
    /**
     * @var Environment
     */
    private $engine;

    /**
     * TwigRender constructor.
     *
     * @param Environment $engine
     */
    public function __construct(Environment $engine)
    {
        $this->engine = $engine;
    }

    /**
     * Render Menu.
     *
     * @param ItemInterface $item
     * @param array         $options
     *
     * @return string
     */
    public function render(ItemInterface $item, array $options = []): string
    {
        return $this->engine->render($options['template'], ['menu' => $item, 'options' => $options]);
    }
}
