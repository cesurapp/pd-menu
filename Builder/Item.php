<?php

/**
 * This file is part of the pd-admin pd-menu package.
 *
 * @package     pd-menu
 * @license     LICENSE
 * @author      Kerem APAYDIN <kerem@apaydin.me>
 * @link        https://github.com/appaydin/pd-menu
 */

namespace Pd\MenuBundle\Builder;

/**
 * Menu Item Properties.
 *
 * @author Kerem APAYDIN <kerem@apaydin.me>
 */
class Item implements ItemInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $label = '';

    /**
     * @var string
     */
    private $labelAfterHtml = '';

    /**
     * @var string
     */
    private $link = '';

    /**
     * @var string
     */
    private $linkAfterHtml = '';

    /**
     * @var int
     */
    private $order;

    /**
     * @var array
     */
    private $route = [];

    /**
     * @var array
     */
    private $linkAttr = [];

    /**
     * @var array
     */
    private $listAttr = [];

    /**
     * @var array
     */
    private $childAttr = [];

    /**
     * @var array
     */
    private $labelAttr = [];

    /**
     * @var array
     */
    private $extra = [];

    /**
     * @var array
     */
    private $roles = [];

    /**
     * @var ItemInterface[]
     */
    private $child = [];

    /**
     * @var null | ItemInterface
     */
    private $parent;

    /**
     * @var bool
     */
    private $event;

    /**
     * Item constructor.
     *
     * @param string $id
     * @param $event
     */
    public function __construct(string $id, $event)
    {
        $this->id = $id;
        $this->event = $event;
    }

    public function isEvent(): bool
    {
        return $this->event;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id = null)
    {
        $this->id = $id;

        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label)
    {
        $this->label = $label;

        return $this;
    }

    public function getLabelAfterHtml(): string
    {
        return $this->labelAfterHtml;
    }

    public function setLabelAfterHtml(string $html)
    {
        $this->labelAfterHtml = $html;

        return $this;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link)
    {
        $this->link = $link;

        return $this;
    }

    public function getLinkAfterHtml(): string
    {
        return $this->linkAfterHtml;
    }

    public function setLinkAfterHtml(string $html)
    {
        $this->linkAfterHtml = $html;

        return $this;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setOrder(int $order)
    {
        $this->order = $order;

        return $this;
    }

    public function getRoute(): array
    {
        return $this->route;
    }

    public function setRoute(string $route, array $params = [])
    {
        $this->route = [
            'name' => $route,
            'params' => $params,
        ];

        return $this;
    }

    public function getLinkAttr(): array
    {
        return $this->linkAttr;
    }

    public function setLinkAttr(array $linkAttr)
    {
        $this->linkAttr = array_merge($this->linkAttr, $linkAttr);

        return $this;
    }

    public function getListAttr(): array
    {
        return $this->listAttr;
    }

    public function setListAttr(array $listAttr)
    {
        $this->listAttr = array_merge($this->listAttr, $listAttr);

        return $this;
    }

    public function getChildAttr(): array
    {
        return $this->childAttr;
    }

    public function setChildAttr(array $childAttr)
    {
        $this->childAttr = array_merge($this->childAttr, $childAttr);

        return $this;
    }

    public function getLabelAttr(): array
    {
        return $this->labelAttr;
    }

    public function setLabelAttr(array $labelAttr)
    {
        $this->labelAttr = array_merge($this->labelAttr, $labelAttr);

        return $this;
    }

    public function getExtra(string $name, $default = false)
    {
        if (\is_array($this->extra) && isset($this->extra[$name])) {
            return $this->extra[$name];
        }

        return $default;
    }

    public function setExtra(string $name, $value)
    {
        if (\is_array($this->extra)) {
            $this->extra[$name] = $value;
        } else {
            $this->extra = [$name => $value];
        }

        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles)
    {
        $this->roles = array_merge($this->roles, $roles);

        return $this;
    }

    public function getChild(): array
    {
        return $this->child;
    }

    public function setChild(array $child)
    {
        $this->child = $child;

        return $this;
    }

    public function addChild($child, $order = null)
    {
        // Create New Item
        if (!$child instanceof ItemInterface) {
            $child = new self($child, $this->event);
        }

        // Child Set Parent & ID
        $child
            ->setOrder($order ?? \count($this->child))
            ->setParent($this);

        // Add Child This
        $this->child[$child->getId()] = $child;

        return $child;
    }

    public function addChildParent($child, $order = null)
    {
        return $this->parent->addChild($child, $order);
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent(ItemInterface $item)
    {
        if ($item === $this) {
            throw new \InvalidArgumentException('Item cannot be a child of itself');
        }

        $this->parent = $item;

        return $this;
    }

    public function isRoot(): bool
    {
        return null === $this->parent;
    }

    public function getLevel(): int
    {
        return $this->parent ? $this->parent->getLevel() + 1 : 0;
    }

    public function offsetExists($childId)
    {
        return isset($this->child[$childId]);
    }

    public function offsetGet($childId)
    {
        return $this->child[$childId];
    }

    public function offsetSet($childId, $order)
    {
        return $this->addChild($childId, $order);
    }

    public function offsetUnset($childId)
    {
        if ($this->offsetExists($childId)) {
            unset($this->child[$childId]);
        }
    }
}
