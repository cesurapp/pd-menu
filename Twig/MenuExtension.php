<?php

/**
 * This file is part of the pd-admin pd-menu package.
 *
 * @package     pd-menu
 * @license     LICENSE
 * @author      Ramazan APAYDIN <apaydin541@gmail.com>
 * @link        https://github.com/appaydin/pd-menu
 */

namespace Pd\MenuBundle\Twig;

use Pd\MenuBundle\Builder\ItemInterface;
use Pd\MenuBundle\Builder\ItemProcessInterface;
use Pd\MenuBundle\Builder\MenuInterface;
use Pd\MenuBundle\Render\RenderInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Menu Twig Extension.
 *
 * @author Ramazan APAYDIN <apaydin541@gmail.com>
 */
class MenuExtension extends AbstractExtension
{
    /**
     * @var RenderInterface
     */
    private $engine;
    /**
     * @var ItemProcessInterface
     */
    private $itemProcess;
    /**
     * @var TranslatorInterface
     */
    private $translator;
    /**
     * @var ParameterBagInterface
     */
    private ParameterBagInterface $parameterBag;

    public function __construct(RenderInterface $engine, ItemProcessInterface $itemProcess,
                                TranslatorInterface $translator,
                                ParameterBagInterface $parameterBag
    )
    {
        $this->engine = $engine;
        $this->itemProcess = $itemProcess;
        $this->translator = $translator;
        $this->parameterBag = $parameterBag;
    }

    /**
     * Create Twig Function.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('pd_menu_render', [$this, 'renderMenu'], ['is_safe' => ['html']]),
            new TwigFunction('pd_menu_get', [$this, 'getMenu']),
            new TwigFunction('arrayToAttr', [$this, 'arrayToAttr'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * Render Menu.
     *
     * @param string $menuClass
     * @param array $options
     *
     * @return string|null
     */
    public function renderMenu(string $menuClass = '', $options = []): ?string
    {
        // Merge Options
        $options = array_merge($this->parameterBag->get('pd_menu'), $options);

        // Get Menu
        $menu = new $menuClass();

        // Render
        if ($menu instanceof MenuInterface) {
            // Process Menu
            $menu = $this->itemProcess->processMenu($menu->createMenu($options), $options);

            return $this->engine->render($menu, $options);
        }

        return null;
    }

    /**
     * Get Menu Array.
     *
     * @param string $menuClass
     * @param array $options
     *
     * @return ItemInterface|null
     */
    public function getMenu(string $menuClass, $options = []): ?ItemInterface
    {
        // Merge Options
        $options = array_merge($this->parameterBag->get('pd_menu'), $options);

        // Get Menu
        $menu = new $menuClass();

        // Render
        if ($menu instanceof MenuInterface) {
            return $this->itemProcess->processMenu($menu->createMenu($options), $options);
        }

        return null;
    }

    /**
     * Array to Html Attr Convert.
     *
     * @param array $array
     * @param array $append
     * @param array $options
     *
     * @return string
     */
    public function arrayToAttr(array $array = [], array $append = [], array $options = []): string
    {
        $array = array_merge_recursive($array, $append);
        $attr = '';

        foreach ($array as $key => $value) {
            if (\is_array($value)) {
                $value = implode(' ', $value);
            }

            if ('title' === mb_strtolower($key)) {
                if (!isset($array['title_translate'])) {
                    $value = $this->translator->trans($value, [],
                        $options['trans_domain'] ?? $this->parameterBag->get('pd_menu')['trans_domain']);
                }
            }

            $attr .= sprintf('%s="%s" ', $key, $value);
        }

        return trim($attr);
    }
}
