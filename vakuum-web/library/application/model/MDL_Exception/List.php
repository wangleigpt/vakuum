<?php
/**
 * Exception Package
 *
 * @author BYVoid
 */
class MDL_Exception_List extends MDL_Exception
{
	const FIELD_LIST = "list";
	const INVALID_PAGE = "invalid_page";
	const INVALID_PAGE_SIZE = "invalid_page_size";

	public function __construct($message)
	{
		$this->desc[self::FIELD_LIST] = $message;
		parent :: __construct(self::FIELD_LIST);
	}
}