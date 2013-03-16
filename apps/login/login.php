<?php
/*
 *   Copyright (C) cmsrevolution.de - All Rights Reserved!
*   Unauthorized copying of this file, via any medium is strictly prohibited
*   Proprietary and confidential
*   Written by cmsrevolution.de, March 2013
*
*   @file: login.php
*   @author: sopitz
*   @created at: 2013-03-16 18:28:40 pm
*   @last edited by: sopitz
*   @file-version: 0.5.1
*
*
*   ToDos:
*   - make passwort encrypted
*   - make login possbile with username and emailadress
*   
*/

class Login {
	public function __call($name, $arguments) {
		//do all the rights-management stuff
		return call_user_func_array(array($this, $name), $arguments);
	}
	
	private function doLogin($args) {
		$args = $args['post']['args'];
		require_once("controllers/doLogin.php");
		require("models/User.php");
		
		$data = json_decode($args);
		$user = new User($data->user, $data->user, $data->pwd, $data->user);
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
			$serialized_string = $_COOKIE['user'];
			$user_array = unserialize($serialized_string);
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
