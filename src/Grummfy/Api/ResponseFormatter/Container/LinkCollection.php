<?php

namespace Grummfy\Api\ResponseFormatter\Container;

class LinkCollection implements LinkCollectionInterface
{
	/**
	 * @var array
	 */
	protected $_links = array();

	/**
	 * @return int
	 */
	public function count()
	{
		return count($this->_links);
	}

	/**
	 * @return \ArrayIterator
	 */
	public function getIterator()
	{
		return new \ArrayIterator($this->_links);
	}

	/**
	 * Add a new link
	 * @param LinkInterface $link
	 * @return $this
	 */
	public function addLink(LinkInterface $link)
	{
		$this->_links[ $link->getRelation() ] = $link;
		return $this;
	}

	/**
	 * Get the link for a specific relation
	 *
	 * @param string $relation
	 * @return LinkInterface|null null if no relation exist
	 */
	public function getLink($relation)
	{
		if (!$this->hasRelation($relation))
		{
			return null;
		}

		return $this->_links[ $relation ];
	}

	public function getLinks()
	{
		return $this->_links;
	}

	/**
	 * It this relation exist?
	 *
	 * @param string $relation
	 * @return bool
	 */
	public function hasRelation($relation)
	{
		return array_key_exists($relation, $this->_links);
	}

	/**
	 * Remove a relation
	 *
	 * @param string $relation
	 * @return bool
	 */
	public function removeRelation($relation)
	{
		if (!$this->hasRelation($relation))
		{
			return false;
		}

		unset($this->_links[ $relation ]);

		return true;
	}

}
