<?php
/**
 * Mixed
 *
 * @author Roman Piták <roman@pitak.net>
 * @package romanpitak/dotmailer-api-v2-client
 * @subpackage DataTypes
 *
 */

namespace DotMailer\Api\DataTypes;

/**
 * Class Mixed
 *
 * All classes in the DataTypes subpackage extend this class
 *
 */
class Mixed implements IDataType {

	protected $data;

	public function __construct($data) {
		$this->data = $data;
	}

	public function toArray() {
		return $this->toJson();
	}

	public function __toString() {
		return (string)$this->toJson();
	}

	public function toJson() {
		return json_encode($this->data);
	}

	public function urlencode() {
		return urlencode((string)$this->data);
	}

}