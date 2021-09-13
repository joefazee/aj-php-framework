<?php

namespace App\Controllers;

/**
 * Class Dashboard
 *
 * @package \App\Controllers
 */
class Dashboard  extends BaseController{


	public function __construct() {
	}

	public function index($req, $res) {
		if(!$req->authenticated()) {
			$res->redirect('/login');
		}
		$res->render('dashboard/index');
	}


}
