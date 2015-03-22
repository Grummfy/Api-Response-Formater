<?php

namespace Grummfy\Api\ResponseFormatter\CollectionJson;

use Grummfy\Api\ResponseFormatter\Render\Wrapper\NullWrapper;
use Grummfy\Api\ResponseFormatter\Render\Wrapper\RenderInterface;
use Grummfy\Api\ResponseFormatter\Render\Wrapper\WrapperInterface;

class CollectionWrapper extends NullWrapper
{
	/**
	 * @var CollectionRepresentation
	 */
	protected $_representation;

	/**
	 * @var string
	 */
	protected $_version;

	public function setRepresentation(CollectionRepresentation $representation)
	{
		$this->_representation = $representation;
		return $this;
	}

	public function setVersion($version)
	{
		$this->_version = $version;
		return $this;
	}

	public function toArray(array $dataToRender, RenderInterface $render)
	{
		$data = $render->renderItemToArray($this->_representation);
		unset($data['data']);
		$data = $data + $dataToRender;

		$data['version'] = $this->_version;

		return [
			'collection'    => $data
		];
	}
}
