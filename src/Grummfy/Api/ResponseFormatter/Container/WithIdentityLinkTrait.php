<?php

namespace Grummfy\Api\ResponseFormatter\Container;

trait WithIdentityLinkTrait /* implements WithIdentityLinkInterface */
{
	/**
	 * @var LinkInterface
	 */
	protected $_selfLink;

	public function getSelfLink()
	{
		return $this->_selfLink;
	}

	public function setSelfLink(LinkInterface $link)
	{
		$this->_selfLink = $link;
		return $this;
	}
}
