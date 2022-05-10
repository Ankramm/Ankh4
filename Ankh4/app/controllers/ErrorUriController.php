<?php 

namespace App\Controllers;
use \Ankh\Framework\Core\BaseController;

class ErrorUriController extends BaseController {
	public function redirect(){
		echo $this->twig->render('404.html', []);
	}
}
