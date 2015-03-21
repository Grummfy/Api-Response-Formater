<?php

namespace Grummfy\Api\ResponseFormater\test\unit\Container;

use Grummfy\Api\ResponseFormater\Container\LinkCollection as TestedClass;

class LinkCollection extends \atoum\test
{
	public function testCount()
	{
		$testedClass = new TestedClass();
		$this->assert()
			->integer($testedClass->count())
			->isEqualTo(count($testedClass))
			->isZero();
	}
}
