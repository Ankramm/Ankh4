<?php
namespace Ankh\Framework\Core;
use \App\Config\Config;
use \App\Controllers\HomeController;
use \App\Controllers\ErrorUriController;
use \Ankh\Framework\Db\Database as D; 
/* First Goal is to receive the key match from our routes and to launch Controller with itself function with this class-key  */ 

class Router {
	function load(){
		$routes = require_once APP_PATH . '/routes.php';
		// TODO striptags or smth else !!!
		$route = trim($_SERVER['REQUEST_URI'], '/');
		$matches = array();

		if(!$route){ 	// redirecting to home page
			$redirHome = new HomeController();
			$redirHome -> index();
			
		} elseif($route){			
			//echo 'URI :',$route,'<br>'; // current uri without first '/'
			foreach ($routes as $key => $value){
				$key = str_replace('/', '\/', $key);
				try{
						if(preg_match("/^".$key."$/",$route , $matches)){
							$matchFound = explode('@', $value);
							list($controllerClass, $controllerFunc) = $matchFound; 
							// var_dump ($controllerClass); // string(15) "LoginController"
							$controllerPath = "App\Controllers\\$controllerClass"; 
							$controllerObj = new $controllerPath();
							// $matchFound = array(2) { [0]=> string(14) "HomeController" [1]=> string(5) "index" }
							if (isset($matchFound)) {
								call_user_func([$controllerObj,"$controllerFunc"]);
							} 
						}		
					} catch(\TypeError $e){   
					echo 'ERROR :', $e;
				}
			}
			   
		 	if(empty($controllerClass)){
				$page404 = new ErrorUriController();							
				$page404 -> redirect();
			}
		}
	}
}