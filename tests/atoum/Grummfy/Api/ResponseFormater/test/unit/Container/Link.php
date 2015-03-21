<?php

namespace Grummfy\Api\ResponseFormater\test\unit\Container;

use Grummfy\Api\ResponseFormater\Container\Link as TestedClass;

class Link extends \atoum\test
{
	public function testUri()
	{
		$testedClass = new TestedClass();

		$this->assert()
			->if()
				->object($testedClass->setUri('ftp://example.tld/user/1'))
				->isEqualTo($testedClass)
			->then()
				->string($testedClass->getUri())
				->isEqualTo('ftp://example.tld/user/1');
	}

	public function testURelation()
	{
		$testedClass = new TestedClass();

		$this->assert()
			->if()
				->object($testedClass->setRelation('self'))
				->isEqualTo($testedClass)
			->then()
				->string($testedClass->getRelation())
				->isEqualTo('self');
	}
}
