<?php
class DoLogout {

	
	
	function _do() {
		setcookie("user", $value, time()-3600);
		baseController::redirect("home", "");
	}
	
	
}
?>