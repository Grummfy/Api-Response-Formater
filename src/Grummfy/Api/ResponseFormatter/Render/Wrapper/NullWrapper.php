<?php

namespace Grummfy\Api\ResponseFormatter\Render\Wrapper;

class NullWrapper implements WrapperInterface
{
	public function addWrapper(WrapperInterface $wrapper)
	{
		throw new \UnexpectedValueException('This wrapper can\'t wrapp another');
	}

	/**
	 * Wrap to an array as an array
	 *
	 * @param array $data
	 * @param RenderInterface $render
	 * @return $this
	 */
	public function toArray(array $data, RenderInterface $render)
	{
		return $data;
	}
}
