<?php

namespace App\Contracts;

/**
 * Class IRouterInterface
 *
 * @package \App\Contracts
 */
interface IRouterInterface {

	public function getCurrentPath() :  string;

	public function getMethodRoutes( $method ) : array;

	public function routes() : array;
}
