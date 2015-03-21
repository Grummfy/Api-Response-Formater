<?php

namespace Grummfy\Api\ResponseFormatter\Format;

interface FormatInterface
{
	/**
	 * Get the mime-type of the format
	 * @return string
	 */
	public function getMimeType();

	/**
	 * Get the name of the format
	 * @return string
	 */
	public function getName();

	/**
	 * Does this format support link
	 * @return bool
	 */
	public function supportLinks();

	/**
	 * Does this format support item
	 * @return bool
	 */
	public function supportItem();

	/**
	 * Does this format support collection of elements
	 * @return bool
	 */
	public function supportCollection();

	/**
	 * Does this format support paginate collection of items
	 * @return bool
	 */
	public function supportPagination();

	/**
	 * Does this format support error
	 * @return bool
	 */
	public function supportError();

	/**
	 * Does this format support exception
	 * @return bool
	 */
	public function supportException();
}
