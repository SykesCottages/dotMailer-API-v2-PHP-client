<?php
/**
 * IJsonArray
 *
 * @author Roman Piták <roman@pitak.net>
 * @package romanpitak/dotmailer-api-v2-client
 * @subpackage DataTypes
 *
 */

namespace DotMailer\Api\DataTypes;

/** Interface IJsonArray */
interface IJsonArray extends IMagicArray {

	/** @return int */
	public function key();

} 