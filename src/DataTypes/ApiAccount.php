<?php
/**
 * ApiAccount
 *
 * @author Roman Piták <roman@pitak.net>
 * @package romanpitak/dotmailer-api-v2-client
 * @subpackage DataTypes
 *
 */

namespace DotMailer\Api\DataTypes;

/**
 * Class ApiAccount
 */
final class ApiAccount extends JsonObject implements IApiAccount {

	/** {@inheritdoc} */
	protected function getProperties() {
		return array(
			'Id' => 'XsInt',
			'Properties' => 'ApiAccountPropertyList'
		);
	}

}