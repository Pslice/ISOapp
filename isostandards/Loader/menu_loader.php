<?php
/* 
 *	menu_loader.php
 * 	Menu Loader Script
 *	AJAX return script to load menu.
 *
 *	Copyright (c) 2013 Tim Cool, MIT license
 */

include_once '../Classes/Database.php';

$table_name = $_POST['table'];
$option = ( isset($_POST['option']) ) ? $_POST['option'] : NULL;

$db = Database::get();
$items = $db->table($table_name);
$html = "";
foreach ($items as $item) {
	$html .= "<li><a class='submenu-".$item['id']."' href='#'>".$item['name']."</a></li>";
}

$display_table_name = ucfirst($table_name);
$display_table_name = substr($display_table_name,0,strlen($display_table_name)-1);


switch ($option) {
	case 'addition':
		$html .= "<li class='divider'></li>
				<li>
				  	<a href='#form-".$table_name."'data-toggle='modal' class='add-menu'>
				  		+ Add ".$display_table_name."
				  	</a>
				</li>";
		break;
	default:
		break;
}

echo $html;

?>