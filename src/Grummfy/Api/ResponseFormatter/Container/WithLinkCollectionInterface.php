<?php

namespace Grummfy\Api\ResponseFormatter\Container;

interface WithLinkCollectionInterface
{
	/**
	 * @return LinkCollectionInterface
	 */
	public function getLinks();

	/**
	 * Add a new link
	 * @param LinkInterface $link
	 * @return $this
	 */
	public function addLink(LinkInterface $link);
}
