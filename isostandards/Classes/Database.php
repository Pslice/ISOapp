<?php 

/* 
 *	Database.php
 * 	Database Class
 *	Class for communicating with database.
 *
 *	Copyright (c) 2013 Tim Cool, MIT license
 */

define('DB_USER', 'root');
define('DB_PASS', '');

class Database {
	protected static $db = NULL;

	protected function __construct(){}

	public static function get(){
		if(is_null(self::$db)){
			try {
				self::$db = new DataObject('mysql:host=localhost;dbname=isoStandards', DB_USER, DB_PASS); 
			}catch(PDOException $error) {
				echo 'Error: '.$error->getMessage();
			}
		}
		return self::$db;
	}

}

class DataObject extends PDO {
	public function table($name) {
		return $this->query("SELECT * FROM $name");
	}
	public function rowsWithFilter($table, $filter){
		return $this->query("SELECT * FROM $table WHERE $filter");
	}
}

?>
