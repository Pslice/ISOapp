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
		App::loadScript('wysihtml5');
		App::loadScript('bootstrap-wysihtml5');
		App::loadScript('bootstrap-editable');
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
					'Design');
		App::displayMenuBar("ISO",$menuItems);

		//Create contents
		$containers = array('articles-side-bar' => 3,'article-content' => 9);
		App::displayContent($containers);

		//$fields = array('name'=>'Tim','age'=>26,'document'=>'Test Doc');
		//$db = Database::get()->insert('test table',$fields);
	?>
</script>
	</body>
	<footer>

	</footer>
</html>