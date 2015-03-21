<?php

namespace Grummfy\Api\ResponseFormatter\Render;

interface RenderInterface
{
	/**
	 * @return array
	 */
	public function toArray();

	/**
	 * @return string
	 */
	public function render();
}
