<?php 

return [
	"home" => "HomeController@index",
	"login" => "LoginController@login",
	"login/process" => "LoginController@process",
	"login/logout" => "LoginController@logout",
	"register" => "RegisterController@registration",
	"register/process" => "RegisterController@process",
	"404" => "ErrorUriController@redirect"
];