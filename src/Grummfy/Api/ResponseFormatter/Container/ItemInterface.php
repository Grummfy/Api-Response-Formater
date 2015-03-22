<?php

namespace Grummfy\Api\ResponseFormatter\Container;

interface ItemInterface extends WithIdentityLinkInterface, WithLinkCollectionInterface
{
	/**
	 * @return array
	 */
	public function toArray();
}
