<?php

namespace Grummfy\Api\ResponseFormatter\Container;

class Exception extends Error implements ExceptionInterface
{
	protected $_isException = false;

	public function setException(\Exception $exception)
	{
		$this->_isException = true;
		$this
			->setCode($exception->getCode())
			->setMessage($exception->getMessage())
			->setTitle('Exception');
	}

	public function isException()
	{
		return $this->_isException;
	}
}
