<?php

namespace Grummfy\Api\ResponseFormatter\CollectionJson;

use Grummfy\Api\ResponseFormatter\Render\RenderInterface;

class Render implements RenderInterface
{
	public function render()
	{
		return json_encode($this->toArray());
	}

	public function toArray()
	{
		return [

		];
	}
}
