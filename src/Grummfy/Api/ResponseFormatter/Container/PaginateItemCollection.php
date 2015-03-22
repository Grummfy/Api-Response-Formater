<?php

namespace Grummfy\Api\ResponseFormatter\Container;

class PaginateItemCollection extends ItemCollection implements PaginateItemCollectionInterface
{
	/**
	 * @var int
	 */
	protected $_offset = 0;

	/**
	 * @var int
	 */
	protected $_limit = 0;

	/**
	 * @var int
	 */
	protected $_page = 0;

	/**
	 * @var int
	 */
	protected $_total = 0;

	public function setPageAndLimit($page, $limit)
	{
		$this->_page = $page;
		$this->_limit = $limit;
		$this->_offset = ($this->_limit * ($this->_page - 1)) + 1;

		return $this;
	}

	public function setOffsetAndLimit($offset, $limit)
	{
		$this->_offset = $offset;
		$this->_limit = $limit;
		$this->_page = intval(ceil($this->_offset / $this->_limit));

		return $this;
	}

	public function setTotal($total)
	{
		$this->_total = $total;
		return $this;
	}

	public function getPage()
	{
		return $this->_page;
	}

	/**
	 * @return int
	 */
	public function getOffset()
	{
		return $this->_offset;
	}

	/**
	 * @return int
	 */
	public function getLimit()
	{
		return $this->_limit;
	}

	/**
	 * @return int
	 */
	public function getTotalCount()
	{
		return $this->_total;
	}
}
