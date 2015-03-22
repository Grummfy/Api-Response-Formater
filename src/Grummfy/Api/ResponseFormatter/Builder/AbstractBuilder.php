<?php

namespace Grummfy\Api\ResponseFormatter\Builder;

use Grummfy\Api\ResponseFormatter\Container\ErrorInterface;
use Grummfy\Api\ResponseFormatter\Container\ItemCollectionInterface;
use Grummfy\Api\ResponseFormatter\Container\ItemInterface;
use Grummfy\Api\ResponseFormatter\Container\LinkCollection;
use Grummfy\Api\ResponseFormatter\Container\LinkInterface;
use Grummfy\Api\ResponseFormatter\Format\FormatInterface;
use Grummfy\Api\ResponseFormatter\Render\Wrapper\WrapperInterface;

abstract class AbstractBuilder implements BuilderInterface
{
	CONST STATE_ERROR = 1;
	CONST STATE_COLLECTION = 2;
	CONST STATE_ITEM = 3;

	/**
	 * @var LinkCollection
	 */
	protected $_links;

	/**
	 * @var WrapperInterface
	 */
	protected $_wrapper;

	/**
	 * @var ItemCollectionInterface
	 */
	protected $_itemCollection;

	/**
	 * @var FormatInterface
	 */
	protected $_format;

	/**
	 * @var ItemInterface
	 */
	protected $_item;

	/**
	 * @var ErrorInterface
	 */
	protected $_error;

	protected $_state;

	public function __construct()
	{
		$this->_links = new LinkCollection();
	}

	public function addLink(LinkInterface $link)
	{
		if (!$this->_format->supportLinks())
		{
			throw new UnsupportedException('Format ' . $this->_format->getName() . ' doesn\'t support link', 1);
		}

		$this->_links->addLink($link);
		return $this;
	}

	public function addWrapper(WrapperInterface $wrapper)
	{
		if (isset($this->_wrapper))
		{
			$this->_wrapper->addWrapper($wrapper);
		}
		else
		{
			$this->_wrapper = $wrapper;
		}

		return $this;
	}

	public function setItem(ItemInterface $item)
	{
		if (!$this->_format->supportLinks())
		{
			throw new UnsupportedException('Format ' . $this->_format->getName() . ' doesn\'t support item', 2);
		}

		$this->_state = self::STATE_ITEM;

		$this->_item = $item;
		return $this;
	}

	public function setItemCollection(ItemCollectionInterface $collection)
	{
		if (!$this->_format->supportLinks())
		{
			throw new UnsupportedException('Format ' . $this->_format->getName() . ' doesn\'t support collection of items', 3);
		}

		$this->_state = self::STATE_COLLECTION;

		$this->_itemCollection = $collection;
		return $this;
	}

	public function setFormat(FormatInterface $format)
	{
		$this->_format = $format;
		return $this;
	}

	public function setError(ErrorInterface $error)
	{
		if (!$this->_format->supportError())
		{
			throw new UnsupportedException('Format ' . $this->_format->getName() . ' doesn\'t support errors', 4);
		}

		$this->_state = self::STATE_ERROR;

		$this->_error = $error;
		return $this;
	}

	public function getState()
	{
		return $this->_state;
	}

	public function isError()
	{
		return isset($this->_error);
	}

	public function getError()
	{
		return $this->_error;
	}

	/**
	 * @return LinkCollection
	 */
	protected function _getLinks()
	{
		return $this->_links;
	}

	/**
	 * @return WrapperInterface
	 */
	protected function _getWrapper()
	{
		return $this->_wrapper;
	}

	/**
	 * @return ItemCollectionInterface
	 */
	protected function _getItemCollection()
	{
		return $this->_itemCollection;
	}

	/**
	 * @return FormatInterface
	 */
	protected function _getFormat()
	{
		return $this->_format;
	}

	/**
	 * @return ItemInterface
	 */
	protected function _getItem()
	{
		return $this->_item;
	}
}
