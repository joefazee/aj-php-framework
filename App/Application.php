<?php
namespace App;

use App\Contracts\IRouterInterface;
use App\Exceptions\InvalidHandlerException;
use App\Http\Request;
use App\Http\Response;

/**
 * Class ApplicationManager
 *
 * @package \\${NAMESPACE}
 */
class Application {

	private static  $instance;

	private  $router;

	private $request;

	private $response;

	private function __construct(IRouterInterface $router) {
		$this->router = $router;
	}

	private function startSession() {
		session_start();
	}


	public static function getInstance(IRouterInterface $router, Request $request, Response $response) : self {
		if(!static::$instance)  {
			static::$instance = new self($router);
			static::$instance->request = $request;
			static::$instance->response = $response;

		}
		return static::$instance;
	}


	public function mount() {

		$this->startSession();

		$currentPath = $this->router->getCurrentPath();

		$routes = $this->router->getMethodRoutes($_SERVER['REQUEST_METHOD']);
		$route = null;
		$routeMatches = null;

		foreach($routes as $regex=>$r) {
			preg_match( '@' . $regex . '$@', $currentPath, $matches);
			if($matches) {
				$route = $r;
				$routeMatches = $matches;
			}
		}

		if(!$route) throw new \Exception('404 Not found');
		$callback = $route['callback'];

		for($i=0; $i < count($route['variables']); $i++) {
			$route['variables'][$i]['data'] = $routeMatches[$route['variables'][$i]['index']];
		}

		$this->request->mapParams($route['variables']);

		if($this->isClosure($callback)) {
			return $this->handleClosure($callback);
		}elseif (is_array($callback)) {
			return $this->handleClassController($callback);
		}

		throw new InvalidHandlerException("Your call is not valid "  . $callback );
	}

	private function isValidHandler($callback) : bool {
		return $this->isClosure($callback) || is_array($callback);
	}

	private function handleClosure($callback) {
		return call_user_func( $callback, $this->request, $this->response );
	}

	private function handleClassController($callback) {

		$controller = $callback[0];
		$action = isset($callback[1]) ? trim($callback[1]) : 'index';

		$instance = new $controller();

		return call_user_func_array([$instance, $action], [ $this->request, $this->response]);
	}

	public function isClosure($t) : bool{
		return $t instanceof \Closure;
	}

	public function dumpRoutes() {
		echo "<pre>";
		print_r($this->router->routes());
		echo "</pre>";
	}

}
