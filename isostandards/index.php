<?php
include("Global.php");

?>


<!DOCTYPE HTML>
<html>
	<head>
	<?php 
		App::loadCSS('bootstrap.min');
		App::loadCSS('bootstrap-editable');
		App::loadCSS('wysihtml5');
		App::loadCSS('app');
		App::loadCSS('menu');
		App::loadScript('jquery-1.9.1.min');
		App::loadScript('bootstrap.min');
		App::loadScript('bootstrap-editable.min');
		App::loadScript('bootstrap-wysihtml5');
		App::loadScript('wysihtml5');
		App::loadScript('app');
		App::loadScript('menu');
	?>
	</head>
	<body>
	<?php
		//Forms
		$forms = array('New Document'=>'documents','New Article'=>'articles');
		Form::createForms($forms);

		//Create menu bar
		$menuItems = array(
					'Documents' => array('mode'=>'dropdown'),
					'Training',
					'Purchase',
					'Menu',
					'Articles' => array('mode'=>'dropdown'),
					'Design');
		App::displayMenuBar("ISO",$menuItems);

		//Create contents
		$containers = array('articles-side-bar' => 3,'article-content' => 9);
		App::displayContent($containers);
	?>
	</body>
	<footer>

	</footer>
</html>