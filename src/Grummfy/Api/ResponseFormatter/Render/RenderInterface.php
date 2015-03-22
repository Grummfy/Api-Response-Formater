<?php

namespace Grummfy\Api\ResponseFormatter\Render\Wrapper;

use Grummfy\Api\ResponseFormatter\Builder\BuilderInterface;
use Grummfy\Api\ResponseFormatter\Container\ErrorInterface;
use Grummfy\Api\ResponseFormatter\Container\ItemCollectionInterface;
use Grummfy\Api\ResponseFormatter\Container\ItemInterface;
use Grummfy\Api\ResponseFormatter\Container\LinkCollectionInterface;
use Grummfy\Api\ResponseFormatter\Container\LinkInterface;

interface RenderInterface
{
	/**
	 * @param BuilderInterface $builder
	 * @return $this
	 */
	public function setBuilder(BuilderInterface $builder);

	/**
	 * @return BuilderInterface
	 */
	public function getBuilder();

	/**
	 * @param LinkInterface $link
	 * @return array
	 */
	public function renderLinkToArray(LinkInterface $link);

	/**
	 * @param LinkCollectionInterface $links
	 * @return array
	 */
	public function renderLinkCollectionToArray(LinkCollectionInterface $links);

	/**
	 * @param ItemCollectionInterface $items
	 * @return array
	 */
	public function renderItemsCollectionToArray(ItemCollectionInterface $items);

	/**
	 * @param ErrorInterface $error
	 * @return array
	 */
	public function renderErrorToArray(ErrorInterface $error);

	/**
	 * @param ItemInterface $item
	 * @return array
	 */
	public function renderItemToArray(ItemInterface $item);

	/**
	 * @return string
	 */
	public function render();

	/**
	 * @return array
	 */
	public function toArray();
}
