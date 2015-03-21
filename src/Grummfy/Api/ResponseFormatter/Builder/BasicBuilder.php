<?php

namespace Grummfy\Api\ResponseFormatter\Builder;

use Grummfy\Api\ResponseFormatter\Container\ErrorInterface;
use Grummfy\Api\ResponseFormatter\Container\ItemCollectionInterface;
use Grummfy\Api\ResponseFormatter\Container\ItemInterface;
use Grummfy\Api\ResponseFormatter\Container\LinkCollection;
use Grummfy\Api\ResponseFormatter\Container\LinkInterface;
use Grummfy\Api\ResponseFormatter\Format\FormatInterface;
use Grummfy\Api\ResponseFormatter\Render\WrapperInterface;

class BasicBuilder implements BuilderInterface
{
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

	public function __construct(FormatInterface $format)
	{
		$this->_links = new LinkCollection();
		$this->setFormat($format);
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

		$this->_item = $item;
		return $this;
	}

	public function setItemCollection(ItemCollectionInterface $collection)
	{
		if (!$this->_format->supportLinks())
		{
			throw new UnsupportedException('Format ' . $this->_format->getName() . ' doesn\'t support collection of items', 3);
		}

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
		$this->_error = $error;
		return $this;
	}

	public function isError()
	{
		return isset($this->_error);
	}
}
