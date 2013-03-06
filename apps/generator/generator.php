<?php
class Generator {
	
	private $view;
	private $viewname;
	
	public function __call($name, $arguments) {		
		//do all the rights-management stuff
		$this->view = $arguments[0];
		$this->viewname = $arguments[1];
		echo $this->view;
		return call_user_func_array(array($this, $name), $arguments);
	}
	
	private function createNewSubmenu($args) {
		echo "Is Array: ".is_array($args);
		require_once("controllers/doCreateNewSubmenu.php");
		$create = new DoCreateNewSubmenu();
// 		var_dump($args);
		$create->_do($this->view, $this->viewname);
	}
}

?>
