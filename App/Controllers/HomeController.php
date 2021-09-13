<?php

namespace App\Controllers;

/**
 * Class HomeController
 *
 * @package App\Controllers
 */
class HomeController  extends BaseController{

	public function index($req, $res) {

		$res->render('home');
	}

}
