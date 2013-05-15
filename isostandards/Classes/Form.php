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

	static private function createFormObjects($title){
		$form_html = '<form class="form-inline">
						<input class="span3" type="text" name="input-title" placeholder="'.$title.' Title">';

		switch ($title) {
			case 'New Document':
				$form_html .= '<div class="input-prepend">
							<span class="add-on">Article Prefix</span>
							<input class="span2" name="input-article-prefix" type="text" placeholder="prefix">
							</div>';
				break;
			case 'New Article':
				break;
			default:
				break;
		}
		$form_html .= '</form>';

		return $form_html;
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
						".self::createFormObjects($title)."
						</div>
						<div class='modal-footer'>
							<a href='#' class='btn' data-dismiss='modal'>Close</a>
							<a href='#' class='btn btn-primary'>Save</a>
						</div>
					</div>";
		}
		echo $html;
	}
}

?>