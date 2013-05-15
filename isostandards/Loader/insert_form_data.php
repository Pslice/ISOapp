<?php
/* 
 *	insert_form_data.php
 * 	Insert Form Data
 *	AJAX to insert data into database.
 *
 *	Copyright (c) 2013 Tim Cool, MIT license
 */

include_once '../Classes/Database.php';

var_dump($_POST);

$insert = array();

if (isset($_POST['table'])) {
	$table = htmlspecialchars($_POST['table']);
}

if (isset($_POST['title'])) {
	$insert['name'] = "'".$_POST['title']."'";
}
if (isset($_POST['prefix'])) {
	$insert['indicator'] = "'".$_POST['prefix']."'";
}

$insert['id_author'] = 1; 


var_dump($insert);

$db = Database::get();
echo $db->insertInto($table, $insert);
 
?>