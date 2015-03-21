<?php

namespace Grummfy\Api\ResponseFormatter\Container;

interface LinkCollectionInterface extends \Countable, \IteratorAggregate
{
	/**
	 * Add a new link
	 * @param LinkInterface $link
	 * @return $this
	 */
	public function addLink(LinkInterface $link);

	/**
	 * Get the link for a specific relation
	 *
	 * @param string $relation
	 * @return LinkInterface|null null if no relation exist
	 */
	public function getLink($relation);

	/**
	 * It this relation exist?
	 *
	 * @param string $relation
	 * @return bool
	 */
	public function hasRelation($relation);

	/**
	 * Remove a relation
	 *
	 * @param string $relation
	 * @return bool
	 */
	public function removeRelation($relation);
}
