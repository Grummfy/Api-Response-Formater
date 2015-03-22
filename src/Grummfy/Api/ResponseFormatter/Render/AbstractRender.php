<?php

namespace Grummfy\Api\ResponseFormatter\Render\Wrapper;

use Grummfy\Api\ResponseFormatter\Builder\BuilderInterface;

abstract class AbstractRender implements RenderInterface
{
	/**
	 * @var BuilderInterface
	 */
	protected $_builder;

	public function getBuilder()
	{
		return $this->_builder;
	}

	public function setBuilder(BuilderInterface $builder)
	{
		$this->_builder = $builder;
	}
}
