<?php

namespace Grummfy\Api\ResponseFormater\Builder;

use Grummfy\Api\ResponseFormater\Container\ItemCollectionInterface;
use Grummfy\Api\ResponseFormater\Container\ItemInterface;
use Grummfy\Api\ResponseFormater\Container\LinkInterface;
use Grummfy\Api\ResponseFormater\Format\FormatInterface;
use Grummfy\Api\ResponseFormater\Render\WrapperInterface;

interface BuilderInterface
{
	/**
	 * @param LinkInterface $link
	 * @return $this
	 */
	public function addLink(LinkInterface $link);

	/**
	 * @param WrapperInterface $wrapper
	 * @return $this
	 */
	public function addWrapper(WrapperInterface $wrapper);

	/**
	 * Define the item in this result
	 * @param ItemInterface $item
	 * @return $this
	 * @throws ApiTypeAlreadyDefinedException
	 */
	public function setItem(ItemInterface $item);

	/**
	 * Define the items collection of the interface
	 * @param ItemCollectionInterface $collection
	 * @return $this
	 * @throws ApiTypeAlreadyDefinedException
	 */
	public function setItemCollection(ItemCollectionInterface $collection);

	/**
	 * @param FormatInterface $format
	 * @return mixed
	 */
	public function setFormat(FormatInterface $format);
}
