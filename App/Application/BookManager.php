<?php

namespace App\Application;

use App\Contracts\IBookInterface;

/**
 * Class BookManager
 *
 * @package \\${NAMESPACE}
 */
class BookManager {

		protected $store;

		public function __construct(IBookInterface $store) {
			$this->store = $store;
		}

		public function all() {
			return $this->store->getAll();
		}

		public function getOneById($id) {
			return $this->store->getById($id);
		}

		public function reverse() {
			return array_reverse($this->all());
		}

}
