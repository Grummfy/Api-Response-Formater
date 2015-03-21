<?php

namespace Grummfy\Api\ResponseFormatter\Container;

interface PaginateItemCollectionInterface extends ItemCollectionInterface
{
	/**
	 * @return int
	 */
	public function getPage();

	/**
	 * @return int
	 */
	public function getOffset();

	/**
	 * @return int
	 */
	public function getLimit();

	/**
	 * @return int
	 */
	public function getTotalCount();
}
