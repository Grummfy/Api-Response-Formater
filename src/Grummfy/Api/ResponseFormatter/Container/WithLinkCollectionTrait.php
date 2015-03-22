<?php

namespace Grummfy\Api\ResponseFormatter\Container;

trait WithLinkCollectionTrait /* implements WithLinkCollectionInterface */
{
	/**
	 * @var LinkCollectionInterface
	 */
	protected $_links;

	public function getLinks()
	{
		return $this->_links;
	}

	public function addLink(LinkInterface $link)
	{
		$this->_links->addLink($link);
		return $this;
	}
}
