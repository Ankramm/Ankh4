<?php

namespace Ankh\Framework\Core;

class Core {
	function load(){
		session_start();
		$router = new Router();
		$router->load();
	}
}