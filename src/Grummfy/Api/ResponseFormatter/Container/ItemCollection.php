<?php

namespace Grummfy\Api\ResponseFormatter\Container;

class ItemCollection implements ItemCollectionInterface
{
	use WithIdentityLinkTrait;
	use WithLinkCollectionTrait;

	/**
	 * @var array<ItemInterface>
	 */
	protected $_items = array();

	public function __construct()
	{
		$this->_links = new LinkCollection();
	}

	/**
	 * @return int
	 */
	public function count()
	{
		return count($this->_items);
	}

	/**
	 * @return \ArrayIterator
	 */
	public function getIterator()
	{
		return new \ArrayIterator($this->_items);
	}

	public function addItem(ItemInterface $item)
	{
		$this->_items[] = $item;
		return $this;
	}

	public function getItems()
	{
		return $this->_items;
	}
}
