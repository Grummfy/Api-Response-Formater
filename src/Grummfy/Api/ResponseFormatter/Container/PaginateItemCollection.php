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

	/**
	 * @var callable
	 */
	protected $_uriBuilderCallback;

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

	public function setCallbackUriPaginationBuilder($uriBuilderCallback)
	{
		$this->_uriBuilderCallback = $uriBuilderCallback;
		return $this;
	}

	public function getPage()
	{
		return $this->_page;
	}

	public function getOffset()
	{
		return $this->_offset;
	}

	public function getLimit()
	{
		return $this->_limit;
	}

	public function getTotalCount()
	{
		return $this->_total;
	}

	public function getLinks()
	{
		$this->_pushRelationLinks();
		return parent::getLinks();
	}

	/**
	 * Add the link for the pagination relation!
	 */
	protected function _pushRelationLinks()
	{
		// /!\ avoid infinite loop
		$links =  parent::getLinks();

		$ub = $this->_uriBuilderCallback;

		$lastPage = intval(ceil($this->getTotalCount() / $this->getLimit()));
		$links->addLink(Link::create('first', $ub(1)));
		$links->addLink(Link::create('last', $ub($lastPage)));

		if ($this->getPage() > 1)
		{
			$links->addLink(Link::create('previous', $ub($this->getPage() - 1)));
		}

		if ($this->getPage() < $lastPage)
		{
			$links->addLink(Link::create('next', $ub($lastPage)));
		}
	}
}
