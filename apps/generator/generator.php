<?php
class Generator {
	public function __call($name, $arguments) {
		//do all the rights-management stuff
		return call_user_func_array(array($this, $name), $arguments);
	}
	
	private function doCreateNewSubmenu($args) {
		$args = $args['post']['args'];
		require_once("controllers/doLogin.php");
		require("models/User.php");
		
		$data = json_decode($args);
		$user = new User($data->user, $data->pwd);
		DoLogin::_do($user);
	}
	
	private function getView($view) {
		return include("views/".$view.".php");
	}
}

?>
