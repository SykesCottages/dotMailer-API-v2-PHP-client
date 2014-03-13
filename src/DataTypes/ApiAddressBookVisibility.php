<?php
/**
 * ApiAddressBookVisibility
 *
 * @author Roman Piták <roman@pitak.net>
 * @package romanpitak/dotmailer-api-v2-client
 * @subpackage DataTypes
 *
 */

namespace DotMailer\Api\DataTypes;

/**
 * Class ApiAddressBookVisibility
 */
final class ApiAddressBookVisibility extends Enum implements IApiAddressBookVisibility {

	protected function getPossibleValues() {
		return array(
			self::VISIBLE,
			self::HIDDEN,
			self::NOT_AVAILABLE_IN_THIS_VERSION
		);
	}

}