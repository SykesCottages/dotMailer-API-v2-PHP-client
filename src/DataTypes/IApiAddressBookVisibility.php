<?php
/**
 * IApiAddressBookVisibility
 *
 * @author Roman Piták <roman@pitak.net>
 * @package romanpitak/dotmailer-api-v2-client
 * @subpackage DataTypes
 *
 */

namespace DotMailer\Api\DataTypes;

/**
 * Interface IApiAddressBookVisibility
 */
interface IApiAddressBookVisibility extends IEnum {

	const VISIBLE = 'Private';
	const HIDDEN = 'Public';
	const NOT_AVAILABLE_IN_THIS_VERSION = 'NotAvailableInThisVersion';

}