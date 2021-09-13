<?php
namespace App\Http;

/**
 * Class Request
 *
 * @package \\${NAMESPACE}
 */
class Request {

	public function mapParams(array $params) {

		foreach($params as $p) {

			$this->{$p['variable']} = $p['data'];
		}
	}

	public function inputs() {
		return array_merge($_GET, $_POST);
	}

	public function input($key) {
		$inputs = $this->inputs();
		return $inputs[$key] ?? '';
	}

	public function files() {
		return $_FILES;
	}

	public function authenticated() : bool {
		return isset($_SESSION['__user']) && !empty($_SESSION['__user']) ? true : false;
	}

	public function clearSession() {
		session_destroy();
	}
}
