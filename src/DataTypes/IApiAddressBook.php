<?php
/**
 * IApiAddressBook
 *
 * @author Roman Piták <roman@pitak.net>
 * @package romanpitak/dotmailer-api-v2-client
 * @subpackage DataTypes
 *
 */

namespace DotMailer\Api\DataTypes;

/**
 * Interface IApiAddressBook
 *
 * @property XsInt id
 * @property XsString name
 * @property ApiAddressBookVisibility visibility
 * @property XsInt contacts
 *
 */
interface IApiAddressBook extends IDataType {

} 