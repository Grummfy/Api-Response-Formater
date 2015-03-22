<?php

namespace Grummfy\Api\ResponseFormatter\Container;

class Error implements ErrorInterface
{
	/**
	 * @var string
	 */
	protected $_message;

	/**
	 * @var string
	 */
	protected $_title;

	/**
	 * @var string
	 */
	protected $_code;

	public function setMessage($message)
	{
		$this->_message = $message;
		return $this;
	}

	public function setCode($code)
	{
		$this->_code = $code;
		return $this;
	}

	public function setTitle($title)
	{
		$this->_title = $title;
		return $this;
	}

	public function getMessage()
	{
		return $this->_message;
	}

	public function getCode()
	{
		return $this->_code;
	}

	public function getTitle()
	{
		return $this->_title;
	}
}
