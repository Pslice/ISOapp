<?php
/* 
 *	Form.php
 *	Form Class, FormObject Class
 * 	Handles the initialization and displaying of forms.
 *
 *	Copyright (c) 2013 Tim Cool, MIT license
 */

class FormObject {
	public $field;
	public $type;

}

class Form {
	private $vars = array();

	static private function createFormObjects(){
		return '<p>testing</p>';
	}

	static public function createForms($forms) {
		$html ='';
		foreach ($forms as $title => $table) {
			$html .= "<div class='modal hide fade' id='form-".$table."'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>
								&times;
							</button>
							<h3>$title</h3>
						</div>
						<div class='modal-body'>
						".self::createFormObjects()."
						</div>
						<div class='modal-footer'>
							<a href='#' class='btn'>Close</a>
							<a href='#' class='btn btn-primary'>Save</a>
						</div>
					</div>";
		}
		echo $html;
	}
}

?>