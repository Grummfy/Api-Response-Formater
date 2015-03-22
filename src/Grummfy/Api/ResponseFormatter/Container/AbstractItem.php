<?php

namespace Grummfy\Api\ResponseFormatter\Container;

abstract class AbstractItem implements ItemInterface
{
	/**
	 * @var LinkCollectionInterface
	 */
	protected $_links;

	/**
	 * @var LinkInterface
	 */
	protected $_selfLink;

	public function __construct()
	{
		$this->_links = new LinkCollection();
	}

	public function addLink(LinkInterface $link)
	{
		$this->_links->addLink($link);
		return $this;
	}

	public function setSelfLink(LinkInterface $link)
	{
		$this->_selfLink = $link;
		return $this;
	}

	/**
	 * @return LinkCollectionInterface
	 */
	public function getLinks()
	{
		return $this->_links;
	}

	/**
	 * @return LinkInterface
	 */
	public function getSelfLink()
	{
		return $this->_selfLink;
	}
}
