<?php

namespace Grummfy\Api\ResponseFormater\Format;

interface FormatInterface
{
	public function supportLinks();
	public function supportPagination();
	public function supportItem();
	public function supportCollection();
	public function supportError();
	public function supportException();
}
