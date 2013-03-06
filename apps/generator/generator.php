<?php
class Generator {
	public function __call($name, $arguments) {		
		//do all the rights-management stuff
		return call_user_func_array(array($this, $name), $arguments);
	}
	
	private function doCreateNewSubmenu($args) {
		require_once("controllers/doCreateNewSubmenu.php");
		$create = new DoCreateNewSubmenu();
		$create->_do($args[0], $args[1]);
	}
}

?>
