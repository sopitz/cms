<?
class login {
	private $globalmethods = array();
	
	public function setMethods($methods) {
		$this->globalmethods = $methods;
		//var_dump($this->globalmethods);
		$this->renderpage();
	}
	public function alive() {
		return "i am alive";	
	}
	
	private function renderpage() {
		extract($this->globalmethods);
		// render template for app
		require_once("./apps/login/index.php"); //path is from webroot
	}
	
}
?>