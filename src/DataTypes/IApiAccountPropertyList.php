<?php
/**
 * IApiAccountPropertyList
 *
 * @author Roman Piták <roman@pitak.net>
 * @package romanpitak/dotmailer-api-v2-client
 * @subpackage DataTypes
 *
 */

namespace DotMailer\Api\DataTypes;

/**
 * Interface IApiAccountPropertyList
 */
interface IApiAccountPropertyList extends IJsonArray {

	/**
	 * @return IApiAccountProperty
	 */
	public function current();

	/**
	 * @param mixed $offset
	 * @return IApiAccountProperty
	 */
	public function offsetGet($offset);

}