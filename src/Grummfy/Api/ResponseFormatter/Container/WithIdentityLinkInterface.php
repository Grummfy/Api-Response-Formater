<?php

namespace Grummfy\Api\ResponseFormatter\Container;

interface WithIdentityLinkInterface
{
	/**
	 * get the link representing the current element
	 * @return LinkInterface
	 */
	public function getSelfLink();

	/**
	 * @param LinkInterface $link
	 * @return $this
	 */
	public function setSelfLink(LinkInterface $link);
}
