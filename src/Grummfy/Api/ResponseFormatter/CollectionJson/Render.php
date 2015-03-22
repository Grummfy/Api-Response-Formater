<?php

namespace Grummfy\Api\ResponseFormatter\CollectionJson;

use Grummfy\Api\ResponseFormatter\Container\ErrorInterface;
use Grummfy\Api\ResponseFormatter\Container\ItemCollectionInterface;
use Grummfy\Api\ResponseFormatter\Container\ItemInterface;
use Grummfy\Api\ResponseFormatter\Container\LinkCollectionInterface;
use Grummfy\Api\ResponseFormatter\Container\LinkInterface;
use Grummfy\Api\ResponseFormatter\Render\AbstractJsonRender;

class Render extends AbstractJsonRender
{
	public function renderLinkToArray(LinkInterface $link)
	{
		return [$link->getRelation() => $link->getUri()];
	}

	public function renderLinkCollectionToArray(LinkCollectionInterface $links)
	{
		$data = array();
		foreach ($links as $link)
		{
			$data[] = $this->renderLinkToArray($link);
		}
		return $data;
	}

	public function renderItemToArray(ItemInterface $item)
	{
		$data = $item->getSelfLink() ? $this->renderLinkToArray($item->getSelfLink()) : $item->getSelfLink();
		$data['data'] = array();
		foreach ($item->toArray() as $field => $value)
		{
			$data['data'][] = [
				'name'  => $field,
				'value' => $value
			];
		}

		if (count($item->getLinks()) > 0)
		{
			$data['links'] = $this->renderLinkCollectionToArray($item->getLinks());
		}

		return $data;
	}

	public function renderItemsCollectionToArray(ItemCollectionInterface $items)
	{
		$datas = array();
		foreach($items as $item)
		{
			$datas[] = $this->renderItemToArray($item);
		}
		return $datas;
	}

	public function renderErrorToArray(ErrorInterface $error)
	{
		return [
			'title'     => $error->getTitle(),
			'code'      => $error->getCode(),
			'message'   => $error->getMessage()
		];
	}

	public function toArray()
	{
		return $this->getBuilder()->toArray($this);
	}
}
