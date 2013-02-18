<?php
class DoLogin {
	
	private $user_exists = 0;
	private $password_correct = -1;
	
	private $user_array = array();
	
	public function _do($user) {
		$username = $user->getName();
		$pwd = $user->getPassword();
		$file = "lib/users.xml";
		if (file_exists($file)) {
			$users = simplexml_load_file($file);
 			foreach ($users as $userdata) {
				if ($userdata->name == $username) {
					$user_array['name'] = $userdata->name;
					$user_array['email'] = $userdata->email;
					$user_array['username'] = $userdata->username;
					$user_array['group'] = $userdata->group;
					$user_array['pwdchanged'] = $userdata->pwdchanged;
					$this->user_exists = 1;
					if ($userdata->password == $pwd) {
						$this->password_correct = 1;
					} else {
						$this->password_correct = 0;
					}
				}
 		   	}
 		   	if ($this->user_exists == 0) {
 		   		echo "user_not_exists";
 		   	} elseif ($this->password_correct == 0) {
 		   		echo "password_incorrect";
 		   	} elseif ($this->password_correct == 1) {
 		   		setcookie("user", serialize($user_array), time()+3600);
 		   		echo "logged_in";
 		   	} elseif ($this->password_correct == -1){
 		   		echo "something_went_wrong";
 		   	} 
		}
		//$user->setGroup("myGroup");
		//echo "true";
	}
}
?>