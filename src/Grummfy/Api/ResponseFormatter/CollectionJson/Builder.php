<?php

namespace Grummfy\Api\ResponseFormatter\CollectionJson;

use Grummfy\Api\ResponseFormatter\Builder\AbstractBuilder;
use Grummfy\Api\ResponseFormatter\Render\Wrapper\RenderInterface;

class Builder extends AbstractBuilder
{
	public function setRepresentation(CollectionRepresentation $representation)
	{
		$this->_getWrapper()->setRepresentation($representation);
		return $this;
	}

	public function setVersion($version)
	{
		$this->_getWrapper()->setVersion($version);
		return $this;
	}

	public function toArray(RenderInterface $render)
	{
		$data = array();
		switch ($this->getState())
		{
			case self::STATE_COLLECTION:
				// TODO manage pagination
				$data['items'] = $render->renderLinkCollectionToArray($this->_getItemCollection());
				break;
			case self::STATE_ITEM:
				$data['items'] = $render->renderItemToArray($this->_getItem());
				break;
			case self::STATE_ERROR:
				$data['error'] = $render->renderErrorToArray($this->_getError());
				break;
			default:
				// TODO maange this case
				throw new \Exception('...');
		}

		return $this->_getWrapper()->toArray($data, $render);
	}
}
