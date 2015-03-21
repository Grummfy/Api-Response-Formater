<?php

namespace Grummfy\Api\ResponseFormatter\Render;

/**
 * Add some data, wrap them, change them..
 */
interface WrapperInterface
{
	/**
	 * Add a wrapper following the decorator pattern
	 * @param WrapperInterface $wrapper
	 * @return $this
	 */
	public function addWrapper(WrapperInterface $wrapper);

	/**
	 * Wrap to an array as an array
	 *
	 * @param array $data
	 * @param RenderInterface $render
	 * @return $this
	 */
	public function toArray(array $data, RenderInterface $render);
}
