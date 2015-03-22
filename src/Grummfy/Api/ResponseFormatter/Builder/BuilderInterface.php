<?php

namespace Grummfy\Api\ResponseFormatter\Builder;

use Grummfy\Api\ResponseFormatter\Container\ErrorInterface;
use Grummfy\Api\ResponseFormatter\Container\ItemCollectionInterface;
use Grummfy\Api\ResponseFormatter\Container\ItemInterface;
use Grummfy\Api\ResponseFormatter\Container\LinkInterface;
use Grummfy\Api\ResponseFormatter\Format\FormatInterface;
use Grummfy\Api\ResponseFormatter\Render\Wrapper\RenderInterface;
use Grummfy\Api\ResponseFormatter\Render\Wrapper\WrapperInterface;

interface BuilderInterface
{
	/**
	 * @param LinkInterface $link
	 * @return $this
	 * @throws UnsupportedException
	 */
	public function addLink(LinkInterface $link);

	/**
	 * @param WrapperInterface $wrapper
	 * @return $this
	 * @throws UnsupportedException
	 */
	public function addWrapper(WrapperInterface $wrapper);

	/**
	 * Define the item in this result
	 * @param ItemInterface $item
	 * @return $this
	 * @throws ApiTypeAlreadyDefinedException
	 * @throws UnsupportedException
	 */
	public function setItem(ItemInterface $item);

	/**
	 * Define the items collection of the interface
	 * @param ItemCollectionInterface $collection
	 * @return $this
	 * @throws ApiTypeAlreadyDefinedException
	 * @throws UnsupportedException
	 */
	public function setItemCollection(ItemCollectionInterface $collection);

	/**
	 * @param FormatInterface $format
	 * @return $this
	 */
	public function setFormat(FormatInterface $format);

	/**
	 * @param ErrorInterface $error
	 * @return $this
	 */
	public function setError(ErrorInterface $error);

	/**
	 * @return ErrorInterface
	 */
	public function getError();

	/**
	 * @return bool
	 */
	public function isError();

	/**
	 * @param RenderInterface $render
	 * @return array
	 */
	public function toArray(RenderInterface $render);
}
