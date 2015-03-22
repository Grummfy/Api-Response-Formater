<?php

namespace Grummfy\Api\ResponseFormatter\Container;

interface ItemCollectionInterface extends WithIdentityLinkInterface, WithLinkCollectionInterface, \Countable, \IteratorAggregate
{
	/**
	 * @param ItemInterface $item
	 * @return $this
	 */
	public function addItem(ItemInterface $item);

	/**
	 * @return array<ItemInterface>
	 */
	public function getItems();
}
