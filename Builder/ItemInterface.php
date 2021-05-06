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
     */
    public function getId(): ?string;

    /**
     * Set Item Array ID | Order ID.
     */
    public function setId($id = null): self;

    /**
     * Get Menu Name.
     */
    public function getLabel(): string;

    /**
     * Change Name Menu Item.
     */
    public function setLabel(string $label): self;

    /**
     * Get Label After HTML.
     */
    public function getLabelAfterHtml(): string;

    /**
     * Label After Append HTML.
     */
    public function setLabelAfterHtml(string $html): self;

    /**
     * Get Menu Item URL.
     */
    public function getLink(): string;

    /**
     * Change Menu URL.
     */
    public function setLink(string $link): self;

    /**
     * Get Link After HTML.
     */
    public function getLinkAfterHtml(): string;

    /**
     * Label Link Append HTML.
     */
    public function setLinkAfterHtml(string $html): self;

    /**
     * Get Order Number.
     */
    public function getOrder(): int;

    /**
     * Set Order Number.
     */
    public function setOrder(int $order): self;

    /**
     * Get Menu Route Name.
     */
    public function getRoute(): array;

    /**
     * Change Menu Route.
     */
    public function setRoute(string $route, array $params = []): self;

    /**
     * Get Link Attributes "<a>".
     */
    public function getLinkAttr(): array;

    /**
     * Set Link Attributes "<a>".
     */
    public function setLinkAttr(array $linkAttr): self;

    /**
     * Get List Attributes "<li>".
     */
    public function getListAttr(): array;

    /**
     * Set List Attributes "<li>".
     */
    public function setListAttr(array $listAttr): self;

    /**
     * Get Child List Attributes "<ul>".
     */
    public function getChildAttr(): array;

    /**
     * Set Child List Attributes "<ul>".
     */
    public function setChildAttr(array $childAttr): self;

    /**
     * Get Label Attributes.
     */
    public function getLabelAttr(): array;

    /**
     * Set Label Interface.
     */
    public function setLabelAttr(array $labelAttr): self;

    /**
     * Get Extra Data Menu Item.
     */
    public function getExtra(string $name, $default = false);

    /**
     * Set Extra Data Menu Item.
     */
    public function setExtra(string $name, $value): self;

    /**
     * Get Access Roles Menu Item.
     */
    public function getRoles(): array;

    /**
     * Set Access Roles Menu Item.
     */
    public function setRoles(array $roles): self;

    /**
     * Get Child Items.
     */
    public function getChild(): array;

    /**
     * Set Child Items.
     */
    public function setChild(array $child): self;

    /**
     * Add Child.
     */
    public function addChild($child, $order = null): self;

    /**
     * Add Child to Parent Item.
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
