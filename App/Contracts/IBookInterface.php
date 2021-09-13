<?php
namespace App\Contracts;

interface IBookInterface {
	public function getAll(): array;
	public function getById(string $id);
}
