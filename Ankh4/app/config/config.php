<?php 

	define('APP_PATH', dirname(__DIR__));
	define('PROJECT_PATH', dirname(dirname(__DIR__)));
	define("SCHEMA", "http:/");
	define("DOMAIN", "localhost");
	define("PORT", ":8080");
	define("HOME", "/home");
	define("LOGIN", "/login");
	define("REGISTER", "/register");
	define("ERROR", "/404");
	//define("PROCESS", "/process");
	define("BASE_URL", SCHEMA . DOMAIN . PORT . HOME);
	define("REGISTER_URL", SCHEMA . DOMAIN . PORT . REGISTER);
	define("LOGIN_URL", SCHEMA . DOMAIN . PORT . LOGIN);