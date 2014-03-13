<?php
/**
 * ApiAddressBook
 *
 * @author Roman Piták <roman@pitak.net>
 * @package romanpitak/dotmailer-api-v2-client
 * @subpackage DataTypes
 *
 */

namespace DotMailer\Api\DataTypes;

/**
 * Class ApiAddressBook
 */
final class ApiAddressBook extends JsonObject implements IApiAddressBook {

	/** {@inheritdoc} */
	protected function getProperties() {
		return array(
			'Id' => 'XsInt',
			'Name' => 'XsString',
			'Visibility' => 'ApiAddressBookVisibility',
			'Contacts' => 'XsInt'
		);
	}

}