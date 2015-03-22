<?php

namespace Grummfy\Api\ResponseFormatter\test\unit\Container;

use Grummfy\Api\ResponseFormatter\Container\PaginateItemCollection as TestedClass;

class PaginateItemCollection extends \atoum\test
{
	public function testItems()
	{
		$testedClass = new TestedClass();
		$item1 = new \mock\Grummfy\Api\ResponseFormatter\Container\ItemInterface();
		$item2 = new \mock\Grummfy\Api\ResponseFormatter\Container\ItemInterface();

		$this->assert('Adding items')
			->object($testedClass->addItem($item1))
			->isIdenticalTo($testedClass);

		$this->assert('Adding items')
			->object($testedClass->addItem($item2))
			->isIdenticalTo($testedClass);

		$this->assert('Retrieve items')
			->array($testedClass->getItems())
			->hasSize(2)
			->strictlyContainsValues([$item1, $item2]);
	}

	public function testOffsetAndPageCompute()
	{
		$limit = 10;
		$offset = 36;
		$page = 4; // 36/10 = 3,... => 4

		$testedClass = new TestedClass();
		$this->assert('offset and page')
			->object($testedClass->setOffsetAndLimit($offset, $limit))
				->isIdenticalTo($testedClass)
			->integer($testedClass->getLimit())
				->isEqualTo($limit)
			->integer($testedClass->getOffset())
				->isEqualTo($offset)
			->integer($testedClass->getPage())
				->isEqualTo($page);
	}

	public function testPageAndOffsetCompute()
	{
		$page = 4;
		$limit = 10;
		$offset = 31; // ((4 - 1) * 10) + 1 (+1 because we start at 1; -1 because we start at page 1)

		$testedClass = new TestedClass();
		$this->assert('page and offset')
			->object($testedClass->setPageAndLimit($page, $limit))
				->isIdenticalTo($testedClass)
			->integer($testedClass->getLimit())
				->isEqualTo($limit)
			->integer($testedClass->getPage())
				->isEqualTo($page)
			->integer($testedClass->getOffset())
				->isEqualTo($offset);
	}

	public function testTotal()
	{
		$testedClass = new TestedClass();
		$this->assert('Total')
			->object($testedClass->setTotal(42))
				->isIdenticalTo($testedClass)
			->integer($testedClass->getTotalCount())
				->isEqualTo(42);
	}
}
