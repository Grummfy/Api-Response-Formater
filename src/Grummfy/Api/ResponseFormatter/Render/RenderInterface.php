<?php

namespace Grummfy\Api\ResponseFormatter\Render;

use Grummfy\Api\ResponseFormatter\ToArrayInterface;

interface RenderInterface extends ToArrayInterface
{
	/**
	 * @return string
	 */
	public function render();
}
