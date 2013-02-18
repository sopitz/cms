<?php
	if(isset($_POST['controller'])) {
		$controller = $_POST['controller'];
		$action = $_POST['action'];
		$args = $_POST['args'];
	}
	
	if(isset($_GET['controller'])) {
		$controller = $_GET['controller'];
		$action = $_GET['action'];
		$args = $_GET['args'];
	}
	
	require("apps/".$controller."/".$controller.".php");
	$Controller = ucfirst($controller);
	$temp = new $Controller();
	$temp->$action($args);
// 	$controller::$action($args);
?>