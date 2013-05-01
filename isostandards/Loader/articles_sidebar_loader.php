<?php 
/* 
 *	articles_sidebar_loader.php
 * 	Articles Sidebar Loader Script
 *	AJAX return script to load a list of articles in the side bar.
 *
 *	Copyright (c) 2013 Tim Cool, MIT license
 */

include_once '../Classes/Database.php';

$filter 	= $_POST['filter'];
$table 		= $_POST['table'];
$relation 	= $_POST['relation'];
$title		= $_POST['title'];

$db = Database::get();
$articles = $db->rowsWithFilter($table, $relation."=".$filter);
$html = "
		<ul class='nav nav-list'>
			<li class='nav-header'>$title</li>
		";
foreach ($articles as $article) {
	$html .= "<li>
				<a href='#container-article-content' data='".$article['id']."'>".$article['name']."</a>
			  </li>";
}
$html .= "
			<li class='divider'></li>
			<li><a href='#form-articles' data-toggle='modal' data='add'>+ Add Article</a></li>
			</ul>";
echo $html;
?>