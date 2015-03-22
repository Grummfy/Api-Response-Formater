<?php

namespace Grummfy\Api\ResponseFormatter\CollectionJson;

use Grummfy\Api\ResponseFormatter\Format\FormatInterface;
use Grummfy\Api\ResponseFormatter\Render\Wrapper\WrapperInterface;

class FormatterFactory
{
	/**
	 * Get then render for the formatter
	 * @return Render
	 */
	public function factoryRender()
	{
		return new Render();
	}

	public function factoryFormat()
	{
		return new Format();
	}

	public function factoryBuilder(FormatInterface $format, WrapperInterface $wrapper)
	{
		$builder = new Builder();
		$builder->setFormat($format);
		$builder->addWrapper($wrapper);
		return $builder;
	}

	public function factoryFirstWrapper()
	{
		return new CollectionWrapper();
	}
}
