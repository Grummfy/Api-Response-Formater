<?php

namespace Grummfy\Api\ResponseFormatter\Container;

interface ItemInterface extends WithIdentityLinkInterface
{
	/**
	 * @return LinkCollectionInterface
	 */
	public function getLinks();

	/**
	 * @return array
	 */
	public function toArray();
}
