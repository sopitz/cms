<?php
class DoLogin {
	
	public function _do($user) {
		// get info from DB
		$user->setGroup("myGroup");
		echo "true";
	}
}
?>