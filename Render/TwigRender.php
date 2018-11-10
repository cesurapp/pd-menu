<?php

/**
 * This file is part of the pd-admin pd-menu package.
 *
 * @package     pd-menu
 *
 * @license     LICENSE
 * @author      Kerem APAYDIN <kerem@apaydin.me>
 *
 * @link        https://github.com/appaydin/pd-menu
 */

namespace Pd\MenuBundle\Render;

use Pd\MenuBundle\Builder\ItemInterface;

/**
 * Menu Twig Rendering.
 *
 * @author Kerem APAYDIN <kerem@apaydin.me>
 */
class TwigRender implements RenderInterface
{
    /**
     * @var \Twig_Environment
     */
    private $engine;

    /**
     * TwigRender constructor.
     *
     * @param \Twig_Environment $engine
     */
    public function __construct(\Twig_Environment $engine)
    {
        $this->engine = $engine;
    }

    /**
     * Render Menu.
     *
     * @param ItemInterface $item
     * @param array         $options
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * @return string
     */
    public function render(ItemInterface $item, array $options = []): string
    {
        return $this->engine->render($options['template'], ['menu' => $item, 'options' => $options]);
    }
}
