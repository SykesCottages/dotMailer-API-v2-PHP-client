<?php
/**
 * Enum
 *
 * @author Roman Piták <roman@pitak.net>
 * @package romanpitak/dotmailer-api-v2-client
 * @subpackage DataTypes
 *
 */

namespace DotMailer\Api\DataTypes;

/**
 * Class Enum
 */
abstract class Enum extends Mixed implements IEnum {

	/** @var IDataType $data */
	protected $data;

	public function __construct($value) {
		$valueClass = $this->getDataClass();
		$this->data = new $valueClass($value);
		if (!in_array($this->data, $this->getPossibleValues(), false)) {
			throw new InvalidValueException('Invalid value');
		}
	}

	/**
	 * Get data class name
	 *
	 * If you wish to change the data class, override this method.
	 *
	 * @return string Data class name with namespace
	 */
	protected function getDataClass() {
		return __NAMESPACE__ . '\\' . 'XsString';
	}


	/*
	 * ========== Abstract ==========
	 */

	/**
	 * Return an array of possible enum values
	 *
	 * @return array
	 */
	abstract protected function getPossibleValues();

	/*
	 * ========== IDataTypes ==========
	 */

	public function __toString() {
		return (string)$this->data;
	}

	public function toArray() {
		return $this->data->toArray();
	}

	public function toJson() {
		return $this->data->toJson();
	}

}