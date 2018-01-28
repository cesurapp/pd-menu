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
