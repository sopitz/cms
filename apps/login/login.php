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
	
	public function is_logged_in() {
		if (isset($_COOKIE['user'])){
			$user_array = array();
			$user_array = unserialize($_COOKIE['user']);
			$file = "lib/users.xml";
			if (file_exists($file)) {
				$users = simplexml_load_file($file);
				foreach ($users as $userdata) {
					if ($userdata->name == $user_array['name']) {
						return "true";
					}
				}
				return "false";
			}
		} 
	}
}

?>
