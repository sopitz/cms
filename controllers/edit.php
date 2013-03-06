<?php
class EditController extends BaseController
{
	public function __construct($action, $urlValues) {
		parent::__construct($action, $urlValues);
		require("models/edit.php");
		$this->model = new EditModel();
	}
	
	protected function index() {
		$this->view->output($this->model->index());
	}
	
	protected function addsubpage() {
		$this->view->output($this->model->addsubpage());
	}

}

?>
