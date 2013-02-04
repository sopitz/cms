<?php
class Login {
	
	public function doLogin($args) {
		require_once("controllers/doLogin.php");
		require("models/User.php");
		
		$data = json_decode($args);
		$user = new User($data->user, $data->pwd);
		DoLogin::_do($user);
	}
	
	public function getView($view) {
		return include("views/".$view.".php");
	}
}

?>
