<?php

namespace Grummfy\Api\ResponseFormater\Container;

interface ErrorInterface
{
	/**
	 * Define the message of the error
	 * @param string $message
	 * @return $this;
	 */
	public function setMessage($message);

	/**
	 * Define the code of the error
	 * @param string $code
	 * @return $this
	 */
	public function setCode($code);

	/**
	 * Defin the title of the error
	 * @param string $title
	 * @return $this
	 */
	public function setTitle($title);

	/**
	 * @return string
	 */
	public function getMessage();

	/**
	 * @return string
	 */
	public function getCode();

	/**
	 * @return string
	 */
	public function getTitle();
}
