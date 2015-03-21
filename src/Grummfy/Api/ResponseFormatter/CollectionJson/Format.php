<?php

namespace Grummfy\Api\ResponseFormatter\CollectionJson;

use Grummfy\Api\ResponseFormatter\Format\FormatInterface;

class Format implements FormatInterface
{
	public function getMimeType()
	{
		return 'application/vnd.collection+json';
	}

	public function getName()
	{
		return 'Collection+Jon';
	}

	public function supportLinks()
	{
		return true;
	}

	public function supportItem()
	{
		return true;
	}

	public function supportCollection()
	{
		return true;
	}

	public function supportPagination()
	{
		return true;
	}

	public function supportError()
	{
		return true;
	}

	public function supportException()
	{
		return false;
	}
}
