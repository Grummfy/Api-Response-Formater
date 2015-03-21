<?php

namespace Grummfy\Api\ResponseFormatter\Container;

interface ExceptionInterface extends ErrorInterface
{
	/**
	 * @param \Exception $exception
	 * @return $this
	 */
	public function setException(\Exception $exception);

	/**
	 * @return bool
	 */
	public function isException();
}
