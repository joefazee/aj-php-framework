<?php

namespace App\Implementations;

use App\Contracts\IBookInterface;
use App\Entities\Book;
use App\Exceptions\IOException;


/**
 * Class JSONBook
 *
 * @package \App\Implementations
 */
class JSONBook implements IBookInterface {

	protected $items;

	public function __construct() {
		$file = APP_PATH . '/data/books.json';


		$data = trim(file_get_contents($file));
		$json = json_decode($data);
		$this->items = array_map(function($item){
			return new Book($item->id, $item->title, $item->description);
		}, $json);
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
