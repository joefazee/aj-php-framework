<?php
use \App\Controllers\HomeController;
use \App\Controllers\Dashboard;

$router->get('/', [HomeController::class]);


$router->get('/login', function($req, $res) {

	$res->render('auth/login');

});

$router->post('/login', function($req, $res) {

	$identity = $req->input('identity');
	$password = $req->input('password');

	if($identity === 'admin' && $password == 'admin') {
		// set session
		$_SESSION['__user'] = '1';
		return $res->redirect('/dashboard');
	}


	$res->redirect('/login');

});


$router->get('/logout', function ($req, $res) {
	$req->clearSession();
	$res->redirect('/login');
});


$router->handle404(function ($req, $res) {
	return $res->redirect();
});
