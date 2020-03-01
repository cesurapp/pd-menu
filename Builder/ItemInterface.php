<?php

/**
 * This file is part of the pd-admin pd-menu package.
 *
 * @package     pd-menu
 * @license     LICENSE
 * @author      Ramazan APAYDIN <apaydin541@gmail.com>
 * @link        https://github.com/appaydin/pd-menu
 */

namespace Pd\MenuBundle\Builder;

/**
 * Menu Item Interface.
 *
 * @author Ramazan APAYDIN <apaydin541@gmail.com>
 */
interface ItemInterface extends \ArrayAccess
{
    /**
     * Menu Created Event.
     */
    public function isEvent(): bool;

    /**
     * Get Item Array ID | Order ID.
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set Item Array ID | Order ID.
     *
     * @param int|null $id
     *
     * @return ItemInterface
     */
    public function setId($id = null);

    /**
     * Get Menu Name.
     */
    public function getLabel(): string;

    /**
     * Change Name Menu Item.
     *
     * @return ItemInterface
     */
    public function setLabel(string $label);

    /**
     * Get Label After HTML.
     */
    public function getLabelAfterHtml(): string;

    /**
     * Label After Append HTML.
     *
     * @return mixed
     */
    public function setLabelAfterHtml(string $html);

    /**
     * Get Menu Item URL.
     */
    public function getLink(): string;

    /**
     * Change Menu URL.
     *
     * @return ItemInterface
     */
    public function setLink(string $link);

    /**
     * Get Link After HTML.
     */
    public function getLinkAfterHtml(): string;

    /**
     * Label Link Append HTML.
     *
     * @return mixed
     */
    public function setLinkAfterHtml(string $html);

    /**
     * Get Order Number.
     */
    public function getOrder(): int;

    /**
     * Set Order Number.
     *
     * @return ItemInterface
     */
    public function setOrder(int $order);

    /**
     * Get Menu Route Name.
     */
    public function getRoute(): array;

    /**
     * Change Menu Route.
     *
     * @return ItemInterface
     */
    public function setRoute(string $route, array $params = []);

    /**
     * Get Link Attributes "<a>".
     */
    public function getLinkAttr(): array;

    /**
     * Set Link Attributes "<a>".
     *
     * @return ItemInterface
     */
    public function setLinkAttr(array $linkAttr);

    /**
     * Get List Attributes "<li>".
     */
    public function getListAttr(): array;

    /**
     * Set List Attributes "<li>".
     *
     * @return ItemInterface
     */
    public function setListAttr(array $listAttr);

    /**
     * Get Child List Attributes "<ul>".
     */
    public function getChildAttr(): array;

    /**
     * Set Child List Attributes "<ul>".
     *
     * @return ItemInterface
     */
    public function setChildAttr(array $childAttr);

    /**
     * Get Label Attributes.
     */
    public function getLabelAttr(): array;

    /**
     * Set Label Interface.
     *
     * @return ItemInterface
     */
    public function setLabelAttr(array $labelAttr);

    /**
     * Get Extra Data Menu Item.
     *
     * @param false $default
     *
     * @return mixed
     */
    public function getExtra(string $name, $default = false);

    /**
     * Set Extra Data Menu Item.
     *
     * @param $value
     *
     * @return ItemInterface
     */
    public function setExtra(string $name, $value);

    /**
     * Get Access Roles Menu Item.
     */
    public function getRoles(): array;

    /**
     * Set Access Roles Menu Item.
     *
     * @return ItemInterface
     */
    public function setRoles(array $roles);

    /**
     * Get Child Items.
     *
     * @return ItemInterface[]
     */
    public function getChild(): array;

    /**
     * Set Child Items.
     *
     * @return ItemInterface
     */
    public function setChild(array $child);

    /**
     * Add Child.
     *
     * @param $child
     * @param null $order
     *
     * @return ItemInterface
     */
    public function addChild($child, $order = null);

    /**
     * Add Child to Parent Item.
     *
     * @param $child
     * @param null $order
     *
     * @return ItemInterface
     */
    public function addChildParent($child, $order = null);

    /**
     * Get Parent Menu Item.
     *
     * @return ItemInterface|null
     */
    public function getParent();

    /**
     * Set Parent Menu Item.
     *
     * @param ItemInterface $item
     *
     * @return ItemInterface
     */
    public function setParent(self $item);

    /**
     * Check Menu is Root.
     */
    public function isRoot(): bool;

    /**
     * Get Menu Level.
     */
    public function getLevel(): int;
}
