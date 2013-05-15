<?php 

/* 
 *	Database.php
 * 	Database Class
 *	Class for communicating with database.
 *
 *	Copyright (c) 2013 Tim Cool, MIT license
 */

class Database {
	protected static $db = NULL;

	protected function __construct(){}

	public static function get(){
		if(is_null(self::$db)){
			try {
				include_once("../Configuration/dbConfig.php");
				self::$db = new DataObject(DB_INFO, DB_USER, DB_PASS); 
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
	public function insertInto($table, $data){
		$field_names 	= '('.implode(',', array_keys($data) ).')';
		$values 		= '('.implode(',', $data ).')';
		$sql ="INSERT INTO $table $field_names VALUES $values ";
		echo $sql;
        return $this->query($sql);
	}
}

?>

