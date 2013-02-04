<?php
	$controller = $_POST['controller'];
	$action = $_POST['action'];
	$args = $_POST['args'];
	
	require("apps/".$controller."/".$controller.".php");
	$controller::$action($args);
?>