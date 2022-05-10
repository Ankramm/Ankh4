<?php 

namespace App\Controllers;

use \Ankh\Framework\Core\BaseController;

class HomeController extends BaseController{
	function index(){
		echo ('current session :<br>'); var_dump($_SESSION); 
		echo $this->twig->render('home.html', []);
	}
}