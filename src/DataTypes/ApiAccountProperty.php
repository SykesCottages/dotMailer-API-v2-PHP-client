<?php
/**
 * ApiAccountProperty
 *
 * @author Roman Piták <roman@pitak.net>
 * @package romanpitak/dotmailer-api-v2-client
 * @subpackage DataTypes
 *
 */

namespace DotMailer\Api\DataTypes;

/**
 * Class ApiAccountProperty
 */
final class ApiAccountProperty extends JsonObject implements IApiAccountProperty {

	/** {@inheritdoc} */
	protected function getProperties() {
		return array(
			'Name' => 'XsString',
			'Type' => 'XsString',
			'Value' => 'XsString',
		);
	}

}