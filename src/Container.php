<?php
/**
 * Container
 *
 * @author Roman Piták <roman@pitak.net>
 * @package romanpitak/dotmailer-api-v2-client
 *
 */

namespace DotMailer\Api;

use DotMailer\Api\Resources\IResources;
use DotMailer\Api\Resources\Resources;
use DotMailer\Api\Rest\Client;

/** Class Container */
final class Container implements IContainer {

	/** @var array $credentials Credentials container */
	private $credentials = array();

	/** @var array $containers Holds object instances */
	private $containers = array();

	private function __construct($credentials = array()) {
		$this->credentials = $credentials;
	}

	/**
	 * Creates a new Container.
	 *
	 * Creates a container based on the credentials.
	 *
	 * @param array $credentials
	 * @return Container
	 */
	public static function newContainer($credentials) {
		return new self($credentials);
	}

	/**
	 * Creates a new Resources object
	 *
	 * Creates a new Rest Client based on the credentials
	 * and returns a new Resources instance based on that Rest Client instance.
	 *
	 * @param array $credentials
	 * @return IResources
	 * @throws Exception
	 */
	public static function newResources($credentials) {
		if ((!isset($credentials[self::USERNAME])) || (!isset($credentials[self::PASSWORD]))) {
			throw new Exception('Invalid credentials');
		}
		$restClient = new Client($credentials[self::USERNAME], $credentials[self::PASSWORD]);
		return new Resources($restClient);
	}

	/**
	 * Get credentials from the credentials container.
	 *
	 * @param string $name
	 * @return array of credentials
	 * @throws Exception
	 */
	private function getCredentials($name) {
		if (!isset($this->credentials[$name])) {
			throw new Exception('Credentials "' . $name . '" not found.');
		}
		return $this->credentials[$name];
	}

	/**
	 * Try to create Resource, then try to create a Container
	 *
	 * @param string $name
	 * @return IResources|IContainer
	 */
	private function getAnything($name) {
		try {
			return $this->getResources($name);
		} catch (Exception $e) {
			return $this->getContainer($name);
		}
	}

	/*
	 * ========== IContainer ==========
	 */

	/**
	 * {@inheritdoc}
	 *
	 * @param string $name
	 * @return IResources
	 * @throws Exception
	 */
	public function getResources($name) {
		if (!isset($this->containers[$name])) {
			$this->containers[$name] = self::newResources($this->getCredentials($name));
		}
		$resources = $this->containers[$name];
		if (!($resources instanceof IResources)) {
			throw new Exception();
		}
		return $resources;
	}

	/**
	 * {@inheritdoc}
	 *
	 * @param string $name
	 * @return IContainer
	 * @throws Exception
	 */
	public function getContainer($name) {
		if (!isset($this->containers[$name])) {
			$this->containers[$name] = self::newContainer($this->getCredentials($name));
		}
		$container = $this->containers[$name];
		if (!($container instanceof IContainer)) {
			throw new Exception();
		}
		return $this->containers[$name];
	}

	/*
	 * ========== Overloading ==========
	 */

	public function __get($key) {
		return $this->getAnything($key);
	}

	public function __call($name, $arguments) {
		return call_user_func_array(array($this->current(), $name), $arguments);
	}

	/*
	 * ========== ArrayAccess ==========
	 */

	public function offsetExists($offset) {
		return isset($this->credentials[$offset]);
	}

	public function offsetGet($offset) {
		return $this->getAnything($offset);
	}

	public function offsetSet($offset, $value) {
		throw new Exception('Values are read-only.');
	}

	public function offsetUnset($offset) {
		throw new Exception('Values are read-only.');
	}

	/*
	 * ========== Iterator ==========
	 */

	public function current() {
		return $this->getAnything($this->key());
	}

	public function key() {
		return key($this->credentials);
	}

	public function next() {
		next($this->credentials);
	}

	public function rewind() {
		reset($this->credentials);
	}

	public function valid() {
		return isset($this->credentials[$this->key()]);
	}

}