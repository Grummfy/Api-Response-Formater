<?php

namespace Grummfy\Api\ResponseFormatter\test\unit\Container;

use Grummfy\Api\ResponseFormatter\Container\ItemCollection as TestedClass;

class ItemCollection extends \atoum\test
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
}
