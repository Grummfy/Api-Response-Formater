<?php

namespace Grummfy\Api\ResponseFormatter\Container;

interface ItemCollectionInterface
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
