<?php

namespace Grummfy\Api\ResponseFormatter\Container;

class ItemCollection implements ItemCollectionInterface
{
	protected $_items = array();

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
