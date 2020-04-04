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
     * @return string
     */
    public function getId(): ?string;

    /**
     * Set Item Array ID | Order ID.
     *
     * @param string $id
     *
     * @return ItemInterface
     */
    public function setId($id = null): self;

    /**
     * Get Menu Name.
     *
     * @return string
     */
    public function getLabel(): string;

    /**
     * Change Name Menu Item.
     *
     * @param string $label
     *
     * @return ItemInterface
     */
    public function setLabel(string $label): self;

    /**
     * Get Label After HTML.
     *
     * @return string
     */
    public function getLabelAfterHtml(): string;

    /**
     * Label After Append HTML.
     *
     * @param string $html
     *
     * @return ItemInterface
     */
    public function setLabelAfterHtml(string $html): self;

    /**
     * Get Menu Item URL.
     *
     * @return string
     */
    public function getLink(): string;

    /**
     * Change Menu URL.
     *
     * @param string $link
     *
     * @return ItemInterface
     */
    public function setLink(string $link): self;

    /**
     * Get Link After HTML.
     *
     * @return string
     */
    public function getLinkAfterHtml(): string;

    /**
     * Label Link Append HTML.
     *
     * @param string $html
     *
     * @return ItemInterface
     */
    public function setLinkAfterHtml(string $html): self;

    /**
     * Get Order Number.
     *
     * @return int
     */
    public function getOrder(): int;

    /**
     * Set Order Number.
     *
     * @param int $order
     *
     * @return ItemInterface
     */
    public function setOrder(int $order): self;

    /**
     * Get Menu Route Name.
     *
     * @return array
     */
    public function getRoute(): array;

    /**
     * Change Menu Route.
     *
     * @param string $route
     * @param array $params
     *
     * @return ItemInterface
     */
    public function setRoute(string $route, array $params = []): self;

    /**
     * Get Link Attributes "<a>".
     *
     * @return array
     */
    public function getLinkAttr(): array;

    /**
     * Set Link Attributes "<a>".
     *
     * @param array $linkAttr
     *
     * @return ItemInterface
     */
    public function setLinkAttr(array $linkAttr): self;

    /**
     * Get List Attributes "<li>".
     *
     * @return array
     */
    public function getListAttr(): array;

    /**
     * Set List Attributes "<li>".
     *
     * @param array $listAttr
     *
     * @return ItemInterface
     */
    public function setListAttr(array $listAttr): self;

    /**
     * Get Child List Attributes "<ul>".
     *
     * @return array
     */
    public function getChildAttr(): array;

    /**
     * Set Child List Attributes "<ul>".
     *
     * @param array $childAttr
     *
     * @return ItemInterface
     */
    public function setChildAttr(array $childAttr): self;

    /**
     * Get Label Attributes.
     *
     * @return array
     */
    public function getLabelAttr(): array;

    /**
     * Set Label Interface.
     *
     * @param array $labelAttr
     *
     * @return ItemInterface
     */
    public function setLabelAttr(array $labelAttr): self;

    /**
     * Get Extra Data Menu Item.
     *
     * @param string $name
     * @param false $default
     *
     * @return mixed
     */
    public function getExtra(string $name, $default = false);

    /**
     * Set Extra Data Menu Item.
     *
     * @param string $name
     * @param $value
     *
     * @return ItemInterface
     */
    public function setExtra(string $name, $value): self;

    /**
     * Get Access Roles Menu Item.
     *
     * @return array
     */
    public function getRoles(): array;

    /**
     * Set Access Roles Menu Item.
     *
     * @param array $roles
     *
     * @return ItemInterface
     */
    public function setRoles(array $roles): self;

    /**
     * Get Child Items.
     *
     * @return ItemInterface[]
     */
    public function getChild(): array;

    /**
     * Set Child Items.
     *
     * @param array $child
     *
     * @return ItemInterface
     */
    public function setChild(array $child): self;

    /**
     * Add Child.
     *
     * @param $child
     * @param null $order
     *
     * @return ItemInterface
     */
    public function addChild($child, $order = null): self;

    /**
     * Add Child to Parent Item.
     *
     * @param $child
     * @param null $order
     *
     * @return ItemInterface
     */
    public function addChildParent($child, $order = null): self;

    /**
     * Get Parent Menu Item.
     *
     * @return ItemInterface|null
     */
    public function getParent(): ?self;

    /**
     * Set Parent Menu Item.
     *
     * @param ItemInterface $item
     *
     * @return ItemInterface
     */
    public function setParent(self $item): self;

    /**
     * Check Menu is Root.
     */
    public function isRoot(): bool;

    /**
     * Get Menu Level.
     */
    public function getLevel(): int;
}
