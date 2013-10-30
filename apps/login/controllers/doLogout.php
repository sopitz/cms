<?php
class DoLogout {

	
	
	function _do() {
		setcookie("session", "", time()-3600);
		baseController::redirect("home", "");
	}
	
	
}
?>