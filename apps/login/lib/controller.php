<?
class login {
	private $globalmethods = array();	
	private $arguments = "";
	
	###### methods #######	
	private function doLogin() {
		setcookie("cr_loggedin", "Vorstand", time()+6000);
	}
	
	private function doLogout() {
		setcookie("cr_loggedin", "Vorstand", time()-6000);
	}
	
	public function isLoggedIn($user) {
		if(isset($_COOKIE["cr_loggedin"])) { return true; } else { return false; }
	}
	
	
	##### internals. dont touch ######
	public function setMethods($methods) {
		$this->doLogin();
		$this->globalmethods = $methods;
		// to be changed if needed
		$this->renderpage();
	}
	
		
	private function renderpage() {
		// passes globalmethods to view. so you can access whatever method you want. HINT: not especially needed. call $this->c("CLASS", "METHOD", array("ARGS"));
		extract($this->globalmethods);
		// render template for app
		require_once("./apps/".get_class()."/index.php"); //path is from webroot
	}
	
	private function c($class, $method, $params) {
		$numargs = func_num_args();
		$args = "";
		if ($numargs >= 2) { //only with params
			$arg_list = func_get_args();
			for ($i = 2; $i < $numargs; $i++) {
				foreach($arg_list[2] as $argument)
				{
					$this->arguments .= $argument.",";
				}
			}
		}
		echo $class::$method(trim($this->arguments, ',')); //trim to eliminate last ,
	}	
}
?>