<?php

namespace Grummfy\Api\ResponseFormatter\test\unit\Container;

use Grummfy\Api\ResponseFormatter\Container\LinkCollection as TestedClass;

class LinkCollection extends \atoum\test
{
	public function testLink()
	{
		$testedClass = new TestedClass();

		$link = new \mock\Grummfy\Api\ResponseFormatter\Container\LinkInterface;
		$this->calling($link)->getRelation = function() {return 'abc';};

		$this->assert('Link exist')
			->if()
				->object($testedClass->addLink($link))
				->hasSize(1)
				->isEqualTo($testedClass)
			->then()
				->object($testedClass->getLink($link->getRelation()))
				->isIdenticalTo($link)
			->then()
				->boolean($testedClass->hasRelation($link->getRelation()))
				->isTrue();

		$this->assert('Link not-exist')
			->if()
				->variable($testedClass->getLink('test'))
				->isNull()
			->then()
				->boolean($testedClass->hasRelation('test'))
				->isFalse();
	}

	public function testRemoveLink()
	{
		$testedClass = new TestedClass();

		$link = new \mock\Grummfy\Api\ResponseFormatter\Container\LinkInterface;
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

		$link1 = new \mock\Grummfy\Api\ResponseFormatter\Container\LinkInterface;
		$this->calling($link1)->getRelation = function() {return 'abc';};

		$link2 = new \mock\Grummfy\Api\ResponseFormatter\Container\LinkInterface;
		$this->calling($link2)->getRelation = function() {return 'def';};

		$testedClass->addLink($link1);
		$testedClass->addLink($link2);

		$this->assert('Is traversable')
			->object($testedClass->getIterator())
			->isInstanceOf('\Traversable')
			->hasSize(2);
	}

	public function testLinkAddingAndGetAll()
	{
		$testedClass = new TestedClass();

		$link1 = new \mock\Grummfy\Api\ResponseFormatter\Container\LinkInterface;
		$this->calling($link1)->getRelation = function() {return 'abc';};

		$link2 = new \mock\Grummfy\Api\ResponseFormatter\Container\LinkInterface;
		$this->calling($link2)->getRelation = function() {return 'def';};
		$this->calling($link2)->getRelation = function() {return 'def';};

		$testedClass->addLink($link1);
		$testedClass->addLink($link2);

		$this->assert('Links is gettable')
			->array($testedClass->getLinks())
			->hasSize(2)
			->object[ $link1->getRelation() ]->isIdenticalTo($link1)
			->object[ $link2->getRelation() ]->isIdenticalTo($link2);

		$link3 = new \mock\Grummfy\Api\ResponseFormatter\Container\LinkInterface;
		$this->calling($link3)->getRelation = function() {return 'def';};
		$testedClass->addLink($link3);

		$this->assert('Links is gettable but if we add same relation it will be override')
			->if()
				->array($testedClass->getLinks())
				->hasSize(2)
				->containsValues([$link1, $link3])
			->then()
				->array($testedClass->getLinks())
				->object[ $link1->getRelation() ]->isIdenticalTo($link1)
				->object[ $link2->getRelation() ]->isNotIdenticalTo($link2) // $link2 ahve the same relation than $link3 but it's not the same instance
				->object[ $link3->getRelation() ]->isIdenticalTo($link3);
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

		$testedClass->addLink(new \mock\Grummfy\Api\ResponseFormatter\Container\LinkInterface);
		$this->assert('Check links in collection')
			->integer($testedClass->count())
			->isEqualTo(count($testedClass))
			->isEqualTo(1);
	}
}
