<?php
class LogoutController extends BaseController
{
	public function __construct($action, $urlValues) {
		parent::__construct($action, $urlValues);

		require("models/logout.php");
		$this->model = new LogoutModel();
	}
	
	protected function index() {
		require("apps/login/controllers/doLogout.php");
		DoLogout::_do();
		//no output because we are relocating in logout procedure
	}

}

?>
