<?php

namespace Grummfy\Api\ResponseFormatter\Container;

abstract class AbstractItem implements ItemInterface
{
	use WithLinkCollectionTrait;
	use WithIdentityLinkTrait;

	public function __construct()
	{
		$this->_links = new LinkCollection();
	}
}
