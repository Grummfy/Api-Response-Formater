<?php

namespace Grummfy\Api\ResponseFormatter\Container;

class ItemCollection implements ItemCollectionInterface
{
	/**
	 * @var array<ItemInterface>
	 */
	protected $_items = array();

	/**
	 * @var LinkInterface
	 */
	protected $_selfLink;

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

	public function getSelfLink()
	{
		return $this->_selfLink;
	}

	public function setSelfLink(LinkInterface $link)
	{
		$this->_selfLink = $link;
		$this;
	}
}
