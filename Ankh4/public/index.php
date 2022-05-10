<?php

//php -S localhost:8080 -t public/

error_reporting(E_ALL);

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/app/config/config.php';

$core = new \Ankh\Framework\Core\Core;
$core->load();