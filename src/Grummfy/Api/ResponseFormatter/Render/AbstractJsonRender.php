<?php

namespace Grummfy\Api\ResponseFormatter\Render;

abstract class AbstractJsonRender extends AbstractRender
{
	public function render()
	{
		return json_encode($this->toArray());
	}
}
