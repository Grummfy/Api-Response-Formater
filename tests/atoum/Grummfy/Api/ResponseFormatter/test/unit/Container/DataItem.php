<?php

namespace Grummfy\Api\ResponseFormatter\test\unit\Container;

use Grummfy\Api\ResponseFormatter\Container\DataItem as TestedClass;

class DataItem extends \atoum\test
{
	public function testSetterGetter()
	{
		$testedClass = new TestedClass();

		$this->assert()->object($testedClass)->isInstanceOf('Grummfy\Api\ResponseFormatter\Container\ItemInterface');

		$this->assert('Data mixed')
			->object($testedClass->setValue('a', 'abc'))
			->isIdenticalTo($testedClass)
			->string($testedClass->getValue('a'))
			->isEqualTo('abc');
	}

	public function testToArray()
	{
		$testedClass = new TestedClass();
		$testedClass
			->setValue('a', 'abc')
			->setValue('b', 'def');

		$this->assert('To array')
			->array($testedClass->toArray())
			->hasKeys(['a', 'b'])
			->strictlyContainsValues(['abc', 'def']);
	}
}
