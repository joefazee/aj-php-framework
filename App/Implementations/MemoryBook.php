<?php
namespace App\Implementations;
use App\Contracts\IBookInterface;
use App\Entities\Book;

/**
 * Class MemoryBook
 *
 * @package \\${NAMESPACE}
 */
class MemoryBook implements IBookInterface {

	protected $items;

	public function __construct() {
		$this->items  = [
			new Book(1, 'How to make money now!'),
			new Book(2, 'Learn programming in 2 hours'),
		];
	}

	public function getAll(): array {
		return $this->items;
	}

	public function getById( string $id ) {
		foreach($this->items as $item) {
			if($item->id == $id) return $item;
		}

		return null;
	}
}
