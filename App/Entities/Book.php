<?php
namespace App\Entities;
/**
 * Class Book
 *
 * @package \\${NAMESPACE}
 */

class Book {
	public  $title;
	public  $id;
	public  $description;

	public function __construct($id, $title, $description = '') {
		$this->id = $id;
		$this->title = $title;
		$this->description = $description;
	}
}
