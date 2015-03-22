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
	 * @param callable $uriBuilderCallback a closure that take as an argument the page number of the uri
	 *          and return thr uri of the link
	 * @return $this
	 */
	public function setCallbackUriPaginationBuilder($uriBuilderCallback);
}
