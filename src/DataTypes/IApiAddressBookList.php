<?php
/**
 * IApiAddressBookList
 *
 * @author Roman Piták <roman@pitak.net>
 * @package romanpitak/dotmailer-api-v2-client
 * @subpackage DataTypes
 *
 */

namespace DotMailer\Api\DataTypes;

/**
 * Interface IApiAddressBookList
 */
interface IApiAddressBookList extends IJsonArray {

	/**
	 * @return IApiAddressBook
	 */
	public function current();

	/**
	 * @param mixed $offset
	 * @return IApiAddressBook
	 */
	public function offsetGet($offset);

}