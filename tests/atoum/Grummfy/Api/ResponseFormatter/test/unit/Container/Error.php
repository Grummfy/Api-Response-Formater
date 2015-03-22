<?php

namespace Grummfy\Api\ResponseFormatter\test\unit\Container;

use Grummfy\Api\ResponseFormatter\Container\Error as TestedClass;

class Error extends \atoum\test
{
	public function testSetterGetter()
	{
		$testedClass = new TestedClass();

		$this->assert()->object($testedClass)->isInstanceOf('Grummfy\Api\ResponseFormatter\Container\ErrorInterface');

		$this->assert('Title')
			->object($testedClass->setTitle('Test'))
				->isIdenticalTo($testedClass)
			->string($testedClass->getTitle())
				->isEqualTo('Test');

		$this->assert('Code')
			->object($testedClass->setCode('1234'))
				->isIdenticalTo($testedClass)
			->string($testedClass->getCode())
				->isEqualTo('1234');

		$this->assert('Message')
			->object($testedClass->setMessage('My message'))
				->isIdenticalTo($testedClass)
			->string($testedClass->getMessage())
				->isIdenticalTo('My message');
	}
}
