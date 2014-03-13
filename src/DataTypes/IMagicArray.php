<?php
/**
 * IMagicArray
 *
 * @author Roman Piták <roman@pitak.net>
 * @package romanpitak/dotmailer-api-v2-client
 * @subpackage DataTypes
 *
 */

namespace DotMailer\Api\DataTypes;

/**
 * Interface IMagicArray
 */
interface IMagicArray extends IDataType, \ArrayAccess, \Iterator {

	/**
	 * @return IDataType
	 */
	public function current();

	/**
	 * @param mixed $offset
	 * @return IDataType
	 */
	public function offsetGet($offset);

}