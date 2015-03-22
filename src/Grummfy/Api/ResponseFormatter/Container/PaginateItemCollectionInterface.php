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

	/**
	 * Get the link for the pagination
	 * @param callable $uriBuilderCallback a closure that take as an argument the page number of the uri
	 *          and return thr uri of the link
	 * @return array of links for the pagination
	 */
	public function getRelationLinks($uriBuilderCallback);
}
