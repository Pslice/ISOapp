<?php
/* 
 *	article_loader.php
 * 	Article Loader Script
 *	AJAX return script to load an article and it's sections.
 *
 *	Copyright (c) 2013 Tim Cool, MIT license
 */

include_once '../Classes/Database.php';

$article 	= $_POST['article'];
$name 		= $_POST['name'];

$db = Database::get();
$sections = $db->rowsWithFilter('sections','article_id='.$article);

$html = "<div class='page-header'>
			<h1>$name</h1>
		</div>";

foreach ($sections as $section) {
	$html .= "
			<section class='section-contents'>
				<h4>".$section['name']."</h4>
				<div id='section-".$section['id']."' data-pk='1' 
				data-type='wysihtml5' data-toggle='manual'
				data-original-title='Section Text' class='editable' tabindex='-1'>"
			.$section['text']."</div>
			</section>
			<script>$('#section-".$section['id']."').editable();</script>
			<div class='edit-contents'>
					<a href='#' class='edit-section' value='".$section['id']."'><i class='icon-edit'></i> [edit]</a>
			</div>";
}

$html .= "<div class='add-section'><a href='#' id='add'><i class='icon-plus-sign'></i> [Add Section]</a></div>";

echo $html;
?>