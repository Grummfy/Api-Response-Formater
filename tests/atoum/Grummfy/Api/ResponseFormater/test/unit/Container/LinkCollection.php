<?php

namespace Grummfy\Api\ResponseFormater\test\unit\Container;

use Grummfy\Api\ResponseFormater\Container\LinkCollection as TestedClass;

class LinkCollection extends \atoum\test
{
	public function testLink()
	{
		$testedClass = new TestedClass();

		$link = new \mock\Grummfy\Api\ResponseFormater\Container\LinkInterface;
		$this->calling($link)->getRelation = function() {return 'abc';};

		$this->assert('Add Link')
			->if()
				->object($testedClass->addLink($link))
				->hasSize(1)
				->isEqualTo($testedClass)
			->then()
				->object($testedClass->getLink($link->getRelation()))
				->isIdenticalTo($link)
			->andThen()
				->boolean($testedClass->hasRelation($link->getRelication()))
				->isTrue();
	}

	public function testRemoveLink()
	{
		$testedClass = new TestedClass();

		$link = new \mock\Grummfy\Api\ResponseFormater\Container\LinkInterface;
		$this->calling($link)->getRelation = function() {return 'abc';};

		$testedClass->addLink($link);

		$this->assert('Remove link')
			->if()
				->boolean($testedClass->removeRelation($link->getRelation()))
				->isTrue()
			->then()
				->object($testedClass)->isEmpty();

		$this->assert('Remove non-existing link')
			->boolean($testedClass->removeRelation($link->getRelation()))
			->isFalse();
	}

	public function testIterable()
	{
		$testedClass = new TestedClass();

		$this->assert('Implements Iterator')
			->object($testedClass)
			->isInstanceOf('\Traversable')
			->isInstanceOf('\IteratorAggregate');

		$link1 = new \mock\Grummfy\Api\ResponseFormater\Container\LinkInterface;
		$link2 = new \mock\Grummfy\Api\ResponseFormater\Container\LinkInterface;
		$testedClass->addLink($link1);
		$testedClass->addLink($link2);

		$this->assert()
			->object($testedClass->getIterator())
			->isInstanceOf('\Traversable');
	}

	public function testCountable()
	{
		$testedClass = new TestedClass();

		$this->assert('Implements Countable')
			->object($testedClass)
			->isInstanceOf('\Countable');

		$this->assert('Check empty link collection')
			->integer($testedClass->count())
			->isEqualTo(count($testedClass))
			->isZero();

		$testedClass->addLink(new \mock\Grummfy\Api\ResponseFormater\Container\LinkInterface);
		$this->assert('Check links in collection')
			->integer($testedClass->count())
			->isEqualTo(count($testedClass))
			->isEqualTo(1);
	}
}
