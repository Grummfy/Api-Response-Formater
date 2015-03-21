<?php

namespace Grummfy\Api\ResponseFormatter\test\unit\Container;

use Grummfy\Api\ResponseFormatter\Container\Link as TestedClass;

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
