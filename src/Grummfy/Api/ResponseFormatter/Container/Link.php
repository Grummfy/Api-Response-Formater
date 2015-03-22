<?php

namespace Grummfy\Api\ResponseFormatter\Container;

class Link implements LinkInterface
{
	/**
	 * @var string
	 */
	protected $_uri;

	/**
	 * @var string
	 */
	protected $_relation;

	public static function create($uri, $relation)
	{
		$link = new self();
		$link
			->setUri($uri)
			->setRelation($relation);
		return $link;
	}

	public function setRelation($relation)
	{
		$this->_relation = $relation;
		return $this;
	}

	public function setUri($uri)
	{
		$this->_uri = $uri;
		return $this;
	}

	public function getRelation()
	{
		return $this->_relation;
	}

	public function getUri()
	{
		return $this->_uri;
	}
}
