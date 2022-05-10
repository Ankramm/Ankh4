<?php 

namespace Ankh\Framework\Db;

class Database {
	public $conn;
	public $path;

	function __construct($path) {
		if (file_exists($path)) {
			$this->path = $path;
		} else {
			echo 'Database did\'t founded';
			//fopen($path, "w") or die('Sorry, Can\'t open database file.');
		}
	}

	function connect() {
		$this->conn = new \PDO("sqlite:" . $this->path, '', '', array(
		    \PDO::ATTR_EMULATE_PREPARES => false,
		    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
		    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC	
		));
	}

	public function destroy() {
		echo "Database.destroy();";
		/*$_SESSION = array();
		header("Location: /home");
		die();*/
	}
}