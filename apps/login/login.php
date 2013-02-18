<?php
class Login {
	public function __call($name, $arguments) {
		//do all the rights-management stuff
		return call_user_func_array(array($this, $name), $arguments);
	}
	
	private function doLogin($args) {
		require_once("controllers/doLogin.php");
		require("models/User.php");
		
		$data = json_decode($args);
		$user = new User($data->user, $data->pwd);
		DoLogin::_do($user);
	}
	
	private function doLogout($args) {
		require_once("controllers/doLogout.php");
		require("models/User.php");
	
		DoLogout::_do();
	}
	
	private function getView($view) {
		return include("views/".$view.".php");
	}
	
	
}

?>
