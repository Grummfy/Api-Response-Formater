<?php

namespace Grummfy\Api\ResponseFormatter\test\unit\Container;

use Grummfy\Api\ResponseFormatter\Container\Exception as TestedClass;

class Exception extends \atoum\test
{
	public function testSetterGetter()
	{
		$testedClass = new TestedClass();

		$this->assert()->object($testedClass)->isInstanceOf('Grummfy\Api\ResponseFormatter\Container\ExceptionInterface');

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

	public function testSetException()
	{
		$testedClass = new TestedClass();
		$exception = new \Exception('My message', 1234);

		$this->assert('Exception')
			->object($testedClass->setException($exception))
			->isIdenticalTo($testedClass)
			->boolean($testedClass->isException())
			->isTrue();

		$this->assert('Code of exception')
			->integer($testedClass->getCode())
			->isEqualTo(1234);

		$this->assert('Message')
			->string($testedClass->getMessage())
			->isIdenticalTo('My message');
	}
}
