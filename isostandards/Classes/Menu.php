<?php
/* 
 *	Menu.php
 *	MenuItem Class
 * 	Handles menu intialization and display.
 *
 *	Copyright (c) 2013 Tim Cool, MIT license
 */

/* Test Comment  */
class MenuItem {
	private $active;
	private $mode;
	private $name;

	public function __construct($name, $active = false, $mode = '' ){
		$this->name = $name;
		$this->active = $active;
		$this->mode = $mode;
	}

	public function __destruct(){
		unset($this->name);
		unset($this->active);
		unset($this->mode);
	}

	private function displayID(){
		return "menu-".strtolower($this->name);
	}

	public function displayItem(){
		$hasClass  = ($this->active) ? "active " : '';

		switch ($this->mode) {
			case 'dropdown':
				$hasClass .= 'dropdown';
				$html = "<li class='$hasClass'>
							<a class='dropdown-toggle' id='".$this->displayID()."'
							   data-toggle = 'dropdown' href='#'>".$this->name."
								<b class='caret'></b>
							</a>
							<ul class='dropdown-menu'>
								<li>".App::displayLoader()."</li>
								<input type='hidden' name='menu-option' value='addition'>
							</ul>
				 		</li>";
				break;
			default:
				$addClasses = (!empty($hasClass)) ? " class='$hasClass'" : '';
				$html = "<li".$addClasses.">
							<a href='#'>".$this->name."</a>
				 		</li>";  
				break;
		}
		return $html;
	}
}

?>