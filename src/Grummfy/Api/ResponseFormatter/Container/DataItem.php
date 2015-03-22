<?php

namespace Grummfy\Api\ResponseFormatter\Container;

class DataItem extends AbstractItem
{
	/**
	 * @var array
	 */
	protected $_data;

	public function __construct(array $data = null)
	{
		parent::__construct();
		$this->_data = (is_null($data)) ? array() : $data;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function setValue($key, $value)
	{
		$this->_data[ $key ] = $value;

		return $this;
	}

	/**
	 * @param string $key
	 * @return null|mixed
	 */
	public function getValue($key)
	{
		return isset($this->_data[ $key ]) ? $this->_data[ $key ] : null;
	}

	public function toArray()
	{
		return $this->_data;
	}
}
