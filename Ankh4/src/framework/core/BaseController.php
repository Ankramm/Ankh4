<?php

namespace Ankh\Framework\Core;

class BaseController {
	public $twig = false;

	function __construct() {
		$loader = new \Twig\Loader\FilesystemLoader(APP_PATH . '/views');

		$this->twig = new \Twig\Environment($loader, [
			'cache' => false, 
		]);

		$this->twig->addGlobal('session', $_SESSION);
	}
}