<?php

namespace Grummfy\Api\ResponseFormatter\Container;

interface ItemInterface
{
	/**
	 * @return array
	 */
	public function toArray();
}
