<?php 
/* 
 *	App.php
 *	Application Class, Container Class
 * 	Handles Application level functionality.
 *
 *	Copyright (c) 2013 Tim Cool, MIT license
 */

class App {

	public static function loadCSS( $filename ) {
		echo "<link rel='stylesheet' href='/css/".$filename.".css' type='text/css' media='screen'>";
	}
	public static function loadScript( $filename ) {
		echo "<script type='text/javascript' src='/js/".$filename.".js'></script>";
	}
	public static function displayMenuBar($title, $menuItems) {
		$html = "<div class='navbar navbar-fixed-top'>
					<a class='brand' href='#'>".$title."</a>
					<ul class='nav nav-tabs'>";
		foreach ($menuItems as $key => $value) {
			if (is_string($key))
				$item = new MenuItem($key,$value['active'],$value['mode']);
			else
				$item = new MenuItem($value);
			$html .= $item->displayItem();
		}

		$html .= "</ul>
				</div>";
		
		echo $html;
	}
	public static function displayLoader($size = 'regular'){
		$html = "<span style='display: block; width: 1em; margin: auto;'>
					<img src='/img/loading.gif'>
				</span>";
		return $html;
	}

	public static function displayContent($containers){
		
		$html = "<div class='container-fluid main-container'>
					<div class='row-fluid'>";
		foreach ($containers as $name => $size) {
			$container = new Container($name, $size);
			$html .= $container->displayContainer();
		}

		$html .= "	</div>
				 </div>";
		echo $html;
	}
}

class Container {

	private $size;
	private $name;

	public function __construct($name, $size){
		$this->size = $size;
		$this->name = $name;
	}

	public function __destruct(){
		unset($this->size);
		unset($this->name);
	}

	public function displayContainer(){
		$html = "<div class='span".$this->size." app-content' id='container-".$this->name."'>
				</div>";
		return $html;
	}
}

?>