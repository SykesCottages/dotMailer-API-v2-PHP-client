<?php
/**
 * JsonArray
 *
 * @author Roman Piták <roman@pitak.net>
 * @package romanpitak/dotmailer-api-v2-client
 * @subpackage DataTypes
 *
 */

namespace DotMailer\Api\DataTypes;

abstract class JsonArray extends MagicArray implements IJsonArray {

	/**
	 * Get data class name
	 *
	 * Gets the current class name and removes "List" from the end.
	 * If you wish to specify some other data class name, override this method.
	 *
	 * @return string Data class name
	 */
	protected function getDataClass() {
		return substr(get_class($this), 0, -4);
	}

	/*
	 * ========== MagicArray ==========
	 */

	function offsetIsAllowed($offset) {
		return (is_null($offset) || (((string)(int)$offset) == $offset) || is_int($offset));
	}

	function convertOffset($offset) {
		return is_null($offset) ? null : (int) $offset;
	}

	function convertValue($value, $offset = null) {
		$dataClass = $this->getDataClass();
		return new $dataClass($value);
	}


	/*
	 * ========== IDataType ==========
	 */

	function toJson() {
		$contents = array();
		foreach ($this->data as $value) {
			$contents[] = $value->toJson();
		}
		return sprintf("[%s]", implode(",", $contents));
	}

}