<?php

namespace Grummfy\Api\ResponseFormatter\Container;

interface LinkInterface
{
	/**
	 * @param string $relation
	 * @return $this
	 */
	public function setRelation($relation);

	/**
	 * @param string $uri
	 * @return $this
	 */
	public function setUri($uri);

	/**
	 * @return string
	 */
	public function getRelation();

	/**
	 * @return string
	 */
	public function getUri();
}
